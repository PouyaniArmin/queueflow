CREATE TABLE IF NOT EXISTS customers (
    id              SERIAL                  PRIMARY KEY,
    business_id     INTEGER                 NOT NULL REFERENCES businesses(id) ON DELETE CASCADE,
    user_id         INTEGER                 REFERENCES users(id) ON DELETE SET NULL,
    name            VARCHAR(100)            NOT NULL,
    phone           VARCHAR(20)             NOT NULL,
    email           VARCHAR(255),
    notes           TEXT,
    is_active       BOOLEAN                 DEFAULT TRUE,
    created_at      TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,

    UNIQUE(business_id, phone)
);