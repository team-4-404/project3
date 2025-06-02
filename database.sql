-- Создание базы данных
CREATE DATABASE IF NOT EXISTS dentclinic CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Использование базы данных
USE dentclinic;

-- Создание таблицы специалистов
CREATE TABLE IF NOT EXISTS specialists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    position VARCHAR(100) NOT NULL,
    specialization VARCHAR(50) NOT NULL,
    experience INT NOT NULL,
    education TEXT NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Создание таблицы расписания специалистов
CREATE TABLE IF NOT EXISTS specialist_schedules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    specialist_id INT NOT NULL,
    day_of_week TINYINT NOT NULL, -- 1-7 (понедельник-воскресенье)
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    slot_duration INT NOT NULL DEFAULT 30, -- длительность слота в минутах
    FOREIGN KEY (specialist_id) REFERENCES specialists(id)
);

-- Создание таблицы слотов
CREATE TABLE IF NOT EXISTS slots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    specialist_id INT NOT NULL,
    slot_date DATE NOT NULL,
    slot_time TIME NOT NULL,
    is_available BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (specialist_id) REFERENCES specialists(id),
    UNIQUE KEY unique_slot (specialist_id, slot_date, slot_time)
);

-- Создание таблицы записей на прием
CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    service VARCHAR(50) NOT NULL,
    slot_id INT NOT NULL,
    status ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'pending',
    unique_code VARCHAR(10) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (slot_id) REFERENCES slots(id)
);

-- Добавление специалистов
INSERT INTO specialists (name, position, specialization, experience, education, description, image) VALUES
('Дубровская Мария', 'Стоматолог-терапевт', 'therapy', 8, 
'Московский государственный медико-стоматологический университет им. А.И. Евдокимова, 2015 г.',
'Специализируется на лечении кариеса, пульпита, периодонтита. Владеет современными методами реставрации зубов. Опыт работы более 8 лет.',
'images/doctor1.png'),

('Сташкова Софья', 'Стоматолог-ортодонт', 'orthodontics', 6,
'Первый Московский государственный медицинский университет им. И.М. Сеченова, 2017 г.',
'Специалист по исправлению прикуса у детей и взрослых. Работает с брекет-системами и элайнерами. Опыт работы более 6 лет.',
'images/doctor2.png'),

('Фомкин Георгий', 'Стоматолог-хирург', 'surgery', 10,
'Российский национальный исследовательский медицинский университет им. Н.И. Пирогова, 2013 г.',
'Специализируется на сложных удалениях зубов, имплантации и костной пластике. Опыт работы более 10 лет.',
'images/doctor3.png'),

('Яман Зейнеп', 'Детский стоматолог', 'pediatric', 5,
'Московский государственный медико-стоматологический университет им. А.И. Евдокимова, 2018 г.',
'Специалист по лечению зубов у детей. Владеет методиками адаптации детей к стоматологическому лечению. Опыт работы более 5 лет.',
'images/doctor4.png'); 