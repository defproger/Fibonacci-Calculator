CREATE TABLE fibonacci_requests
(
    id               INT AUTO_INCREMENT PRIMARY KEY,
    username         VARCHAR(255) NOT NULL,
    user_input       INT          NOT NULL,
    fibonacci_number text         NOT NULL,
    ip_address       VARCHAR(255) NOT NULL,
    created_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);