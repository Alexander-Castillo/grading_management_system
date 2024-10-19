<?php
namespace App\Services;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService{
    protected $userRepository;
    
    
    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }
    public function registerTeacher(array $data, array $teacherData, array $sections, array $subjects): User{
        DB::beginTransaction();
        try {
            // crear un usuario
            $user = $this->userRepository->create([
                'name' => $data['firstName'].' '.$data['lasName'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'teacher',
            ]);
            // crear un profesor
            $teacher = Teacher::create([
                'user_id' => $user->id,
                'escalafon' => $teacherData['escalafon'],
                'specialization' => $teacherData['specialization'],
                'birthdate' => $teacherData['birthdate'],
                'phone_number' => $teacherData['phone_number'],
            ]);
            // asignar secciones y materias
            $teacher->sections()->attach($sections,['subject_id' => $subjects]);
            // crear un profesor
            DB::commit();
            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
    // registrar estudiante
    public function registerStudent(array $data, array $studentData, array $enrollments): User{
        DB::beginTransaction();
        try{
            // crear usuario rol estudiante
            $user = $this->userRepository->create([
                'name' => $data['fist_name'].' '. $data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'student',
            ]);
            // crear estudiante
            $student = Student::create([
                'user_id' => $user->id,
                'carnet' => $studentData['carnet'],
                'birthdate' => $studentData['birthdate'],
                'phone_number' => $studentData['phone_number'],
            ]);
            // matricular estudiante a materias
            foreach ($enrollments as $enrollment) {
                $student->enrollments()->create($enrollment);
            }
            DB::commit();
            return $user;
        }catch(Exception $e){
            DB::rollBack();
            throw $e;
        }
    }
}