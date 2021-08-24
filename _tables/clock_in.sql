CREATE TABLE clocking
(
    clockingId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    emp_id VARCHAR(50) NOT NULL,
    clock_in_date DATE,
    clock_out_date DATE,
    clock_in_time DATETIME,
    clock_out_time DATETIME,
    duration_minutes INT,
    duration_hours INT,
    posted_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);