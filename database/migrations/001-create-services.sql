CREATE TABLE IF NOT EXISTS services (
    id                SERIAL                  PRIMARY KEY,
    business_id       INTEGER                 NOT NULL REFERENCES businesses(id) ON DELETE CASCADE,
    name              VARCHAR(150)            NOT NULL,
    duration_minutes  INTEGER                 NOT NULL CHECK (duration_minutes > 0),
    price             DECIMAL(10, 2)          DEFAULT 0.00,
    max_capacity      INTEGER                 DEFAULT 1 CHECK (max_capacity >= 1),
    is_active         BOOLEAN                 DEFAULT TRUE,
    created_at        TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    updated_at        TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);