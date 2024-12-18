-- Table des docteurs
CREATE TABLE Doctors (
    doctor_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    specialization VARCHAR(100),
    phone_number VARCHAR(20),
    email VARCHAR(100) UNIQUE NOT NULL -- Email unique pour contact, mais pas pour inscription
);

-- Table des patients
CREATE TABLE Patients (
    patient_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL, -- Email unique pour l'inscription
    password VARCHAR(255) NOT NULL -- Mot de passe pour l'inscription et la connexion
);

-- Table des rendez-vous
CREATE TABLE Appointments (
    appointment_id INT PRIMARY KEY AUTO_INCREMENT,
    doctor_id INT NOT NULL,
    patient_id INT NOT NULL,
    appointment_date DATETIME NOT NULL,
    status VARCHAR(20) DEFAULT 'Scheduled', -- 'Scheduled', 'Completed', 'Cancelled'
    FOREIGN KEY (doctor_id) REFERENCES Doctors(doctor_id) ON DELETE CASCADE,
    FOREIGN KEY (patient_id) REFERENCES Patients(patient_id) ON DELETE CASCADE
);

-- Table des consultations
    CREATE TABLE Consultations (
        consultation_id INT PRIMARY KEY AUTO_INCREMENT,
        appointment_id INT NOT NULL,
        consultation_date DATETIME NOT NULL,
        diagnosis VARCHAR(255),
        notes TEXT,
        FOREIGN KEY (appointment_id) REFERENCES Appointments(appointment_id) ON DELETE CASCADE
    );

-- Table unique pour l'administrateur
CREATE TABLE Admin (
    admin_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE, -- Nom d'utilisateur pour l'admin
    password VARCHAR(255) NOT NULL, -- Mot de passe hashé
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL -- Email unique pour l'admin
);
