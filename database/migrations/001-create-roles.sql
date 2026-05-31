CREATE TABLE IF NOT EXISTS roles (
    id              SERIAL                  PRIMARY KEY,
    name            VARCHAR(100)            NOT NULL,
    description     VARCHAR(150),
    created_at      TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO roles(id,name,description)
    VALUES(1,'coustomer','Regular user who can book appointments'),
        (2,'owner','Business owner who can manage their business'),
        (3,'admin','System administrator with full access') ON CONFLICT (id) DO NOTHING;