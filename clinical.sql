-- Table des docteurs
CREATE TABLE Doctors (
    doctor_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    specialization VARCHAR(100),
    phone_number VARCHAR(20),
    email VARCHAR(100)
);

-- Table des patients
CREATE TABLE Patients (
    patient_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(100)
);

-- Table des rendez-vous
CREATE TABLE Appointments (
    appointment_id INT PRIMARY KEY AUTO_INCREMENT,
    doctor_id INT,
    patient_id INT,
    appointment_date DATETIME NOT NULL,
    status VARCHAR(20) DEFAULT 'Scheduled', 
    FOREIGN KEY (doctor_id) REFERENCES Doctors(doctor_id),
    FOREIGN KEY (patient_id) REFERENCES Patients(patient_id)
);

-- Table for consultations
CREATE TABLE Consultations (
    consultation_id INT PRIMARY KEY AUTO_INCREMENT,
    appointment_id INT,
    consultation_date DATETIME NOT NULL,
    diagnosis VARCHAR(255),
    notes TEXT,
    FOREIGN KEY (appointment_id) REFERENCES Appointments(appointment_id)
);



-- Table for admins
CREATE TABLE Admins (
    admin_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, 
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    email VARCHAR(100),
    role VARCHAR(50) DEFAULT 'admin', 
);

