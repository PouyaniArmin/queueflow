CREATE TABLE IF NOT EXISTS business_ownerships (
    id                SERIAL                  PRIMARY KEY,
    user_id           INTEGER                 NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    business_id       INTEGER                 NOT NULL REFERENCES businesses(id) ON DELETE CASCADE,
    ownership_role    VARCHAR(50)             NOT NULL DEFAULT 'owner'
                          CHECK (ownership_role IN ('owner', 'co_owner', 'manager', 'admin')),
    created_at        TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    updated_at        TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    
    UNIQUE (user_id, business_id)
);