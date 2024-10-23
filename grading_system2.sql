use grading_system;
INSERT INTO facultad (facultad_name, facultad_description) VALUES
('Facultad de Ingeniería', 'Ofrece programas en diversas ramas de la ingeniería, incluyendo civil, mecánica y electrónica.'),
('Facultad de Medicina', 'Formación integral de médicos con énfasis en la investigación y atención a la salud.'),
('Facultad de Ciencias Sociales', 'Estudia las dinámicas humanas y las interacciones sociales a través de diversas disciplinas.'),
('Facultad de Derecho', 'Preparación de profesionales en leyes, ética y derechos humanos.'),
('Facultad de Educación', 'Enfocada en la formación de docentes y estudios sobre metodologías educativas.'),
('Facultad de Ciencias Económicas', 'Analiza los principios de la economía y la administración de empresas.'),
('Facultad de Artes', 'Promueve el desarrollo de habilidades artísticas en disciplinas como música, pintura y teatro.'),
('Facultad de Ciencias Naturales', 'Estudio de las ciencias biológicas, químicas y físicas para entender el mundo natural.');
INSERT INTO careers (facultad_id, career_name, career_description) VALUES
(1, 'Ingeniería Civil', 'Forma profesionales capaces de diseñar y construir infraestructuras como puentes y edificios.'),
(1, 'Ingeniería Electrónica', 'Estudia el diseño y desarrollo de circuitos y sistemas electrónicos.'),
(2, 'Medicina General', 'Formación de médicos que atienden la salud integral de los pacientes.'),
(2, 'Odontología', 'Enfocada en la salud bucal y la prevención de enfermedades dentales.'),
(3, 'Psicología', 'Estudia el comportamiento humano y los procesos mentales.'),
(3, 'Trabajo Social', 'Prepara a profesionales para ayudar a mejorar la calidad de vida de comunidades.'),
(4, 'Derecho', 'Forma abogados con un sólido conocimiento de leyes y jurisprudencia.'),
(5, 'Pedagogía', 'Desarrolla habilidades para enseñar y gestionar entornos educativos.'),
(6, 'Administración de Empresas', 'Proporciona herramientas para gestionar organizaciones y recursos.'),
(6, 'Contaduría Pública', 'Estudia la gestión financiera y contable de empresas e instituciones.'),
(7, 'Música', 'Desarrolla habilidades interpretativas y compositivas en diversas disciplinas musicales.'),
(7, 'Artes Visuales', 'Fomenta la creatividad en técnicas de pintura, escultura y diseño gráfico.'),
(8, 'Biología', 'Estudia los seres vivos y sus interacciones con el medio ambiente.'),
(8, 'Química', 'Explora la composición, estructura y propiedades de la materia.');
INSERT INTO specialities (specialty_name, specialty_description) VALUES
('Estructuras', 'Especialidad en el diseño y análisis de estructuras de construcción.'),
('Transporte', 'Enfocada en la planificación y gestión de sistemas de transporte.'),
('Electrónica Digital', 'Estudia circuitos y sistemas digitales.'),
('Medicina Familiar', 'Especialización en atención integral de la familia.'),
('Pediatría', 'Enfocada en el cuidado de la salud infantil.'),
('Psicología Clínica', 'Estudio y tratamiento de trastornos mentales.'),
('Psicopedagogía', 'Orientación y apoyo en procesos de aprendizaje.'),
('Derecho Civil', 'Especialidad en normas que regulan las relaciones entre particulares.'),
('Derecho Penal', 'Enfocada en el estudio de delitos y sus penas.'),
('Educación Infantil', 'Preparación para enseñar a niños en etapas iniciales.'),
('Gestión Educativa', 'Estudio de la administración de instituciones educativas.'),
('Marketing', 'Estrategias de promoción y venta de productos y servicios.'),
('Finanzas', 'Gestión de recursos económicos y análisis financiero.'),
('Microbiología', 'Estudio de microorganismos y su impacto en la salud.'),
('Química Orgánica', 'Investigación de compuestos que contienen carbono.');
INSERT INTO career_specialty (career_id, specialities_id) VALUES
(1, 1),  -- Ingeniería Civil con Estructuras
(1, 2),  -- Ingeniería Civil con Transporte
(1, 3),  -- Ingeniería Electrónica con Electrónica Digital
(2, 4),  -- Medicina General con Medicina Familiar
(2, 5),  -- Medicina General con Pediatría
(3, 6),  -- Psicología con Psicología Clínica
(3, 7),  -- Psicología con Psicopedagogía
(4, 8),  -- Derecho con Derecho Civil
(4, 9),  -- Derecho con Derecho Penal
(5, 10), -- Pedagogía con Educación Infantil
(5, 11), -- Pedagogía con Gestión Educativa
(6, 12), -- Administración de Empresas con Marketing
(6, 13), -- Administración de Empresas con Finanzas
(8, 14), -- Biología con Microbiología
(8, 15); -- Química con Química Orgánica
INSERT INTO subjects (specialities_id, subject_name, subject_description) VALUES
(1, 'Resistencia de Materiales', 'Estudia el comportamiento de los materiales bajo diferentes cargas.'),
(1, 'Diseño Estructural', 'Fundamentos para el diseño de estructuras seguras y eficientes.'),
(2, 'Planeación de Transporte', 'Principios de la planificación y gestión de sistemas de transporte.'),
(2, 'Logística', 'Estudia la gestión de la cadena de suministro y distribución.'),
(3, 'Circuitos Digitales', 'Fundamentos de circuitos electrónicos digitales y su diseño.'),
(4, 'Atención Primaria', 'Enfoque en la atención médica básica y prevención de enfermedades.'),
(4, 'Salud Pública', 'Estudia las políticas de salud y su impacto en la comunidad.'),
(5, 'Pediatría Preventiva', 'Enfoque en la prevención de enfermedades en niños.'),
(6, 'Evaluación Psicológica', 'Métodos para la evaluación y diagnóstico psicológico.'),
(6, 'Terapia Cognitivo-Conductual', 'Técnicas para tratar trastornos mentales a través de la modificación del comportamiento.'),
(7, 'Psicología Educativa', 'Estudia el impacto de los procesos educativos en el desarrollo psicológico.'),
(8, 'Contratos', 'Análisis de la normativa relacionada con contratos y obligaciones.'),
(8, 'Derecho Procesal', 'Estudia el conjunto de normas que regulan los procesos judiciales.'),
(9, 'Didáctica General', 'Principios y métodos de enseñanza en la educación infantil.'),
(10, 'Administración Educativa', 'Gestión y organización de instituciones educativas.'),
(11, 'Comportamiento del Consumidor', 'Estudia cómo los consumidores toman decisiones de compra.'),
(11, 'Estrategias de Marketing', 'Desarrollo de estrategias efectivas para el marketing.'),
(12, 'Microbiología General', 'Fundamentos sobre microorganismos y su clasificación.'),
(13, 'Química Inorgánica', 'Estudio de la química de compuestos inorgánicos.'),
(14, 'Bioquímica', 'Estudio de procesos químicos en organismos vivos.'),
(15, 'Química Analítica', 'Métodos para el análisis de compuestos químicos.');
INSERT INTO sections (section_name) VALUES
('Sección A'),
('Sección B'),
('Sección C'),
('Sección D'),
('Sección E');
INSERT INTO sections_subjects (section_id, subject_id) VALUES
(1, 1),  -- Sección A con Resistencia de Materiales
(1, 3),  -- Sección A con Circuitos Digitales
(2, 2),  -- Sección B con Diseño Estructural
(2, 4),  -- Sección B con Atención Primaria
(3, 5),  -- Sección C con Pediatría Preventiva
(3, 6),  -- Sección C con Evaluación Psicológica
(4, 8),  -- Sección D con Contratos
(4, 9),  -- Sección D con Didáctica General
(5, 11), -- Sección E con Comportamiento del Consumidor
(5, 12); -- Sección E con Microbiología General
