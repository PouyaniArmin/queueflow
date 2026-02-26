CREATE TABLE IF NOT EXISTS appointments (
    id                 SERIAL                  PRIMARY KEY,
    business_id        INTEGER                 NOT NULL REFERENCES businesses(id) ON DELETE CASCADE,
    service_id         INTEGER                 NOT NULL REFERENCES services(id) ON DELETE RESTRICT,
    customer_user_id   INTEGER                 REFERENCES users(id) ON DELETE SET NULL,  -- nullable برای مهمان
    customer_name      VARCHAR(100)            NOT NULL,
    customer_phone     VARCHAR(20)             NOT NULL,
    customer_email     VARCHAR(255),
    date_time          TIMESTAMP WITH TIME ZONE NOT NULL,
    status             VARCHAR(20)             NOT NULL 
                               CHECK (status IN ('pending', 'confirmed', 'cancelled', 'completed'))
                               DEFAULT 'pending',
    access_token       VARCHAR(64)             UNIQUE,
    notes              TEXT,
    created_at         TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    updated_at         TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);
