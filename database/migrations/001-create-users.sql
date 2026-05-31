CREATE TABLE IF NOT EXISTS users (
    id              SERIAL                  PRIMARY KEY,
    name            VARCHAR(100)            NOT NULL,
    email           VARCHAR(255)            UNIQUE NOT NULL,
    password_hash   VARCHAR(255)            NOT NULL,
    phone           VARCHAR(20)             UNIQUE,
    role_id         INTEGER                 NOT NULL DEFAULT 1,
    is_active       BOOLEAN                 DEFAULT TRUE,
    created_at      TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    
    CONSTRAINT fk_user_role 
        FOREIGN KEY (role_id) REFERENCES roles(id)
);