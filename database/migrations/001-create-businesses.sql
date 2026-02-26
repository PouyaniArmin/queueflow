CREATE TABLE IF NOT EXISTS businesses (
    id              SERIAL                  PRIMARY KEY,
    name            VARCHAR(150)            NOT NULL,
    slug            VARCHAR(100)            UNIQUE NOT NULL,
    address         TEXT,
    phone           VARCHAR(20),
    description     TEXT,
    timezone        VARCHAR(50)             DEFAULT 'Asia/Tehran',
    is_active       BOOLEAN                 DEFAULT TRUE,
    created_at      TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);