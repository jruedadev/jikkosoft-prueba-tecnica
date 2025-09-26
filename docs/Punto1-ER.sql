-- Crear tabla users
CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  email_verified_at TIMESTAMP NULL,
  password VARCHAR(255) NOT NULL,
  remember_token VARCHAR(100) NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

-- Crear tabla posts
CREATE TABLE posts (
  id SERIAL PRIMARY KEY,
  user_id INTEGER NOT NULL REFERENCES users(id) ON DELETE CASCADE,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

-- Crear tabla comments
CREATE TABLE comments (
  id SERIAL PRIMARY KEY,
  user_id INTEGER NOT NULL REFERENCES users(id) ON DELETE CASCADE,
  post_id INTEGER NOT NULL REFERENCES posts(id) ON DELETE CASCADE,
  content TEXT NOT NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

-- Crear tabla tags
CREATE TABLE tags (
  id SERIAL PRIMARY KEY,
  name VARCHAR(255) UNIQUE NOT NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

-- Crear tabla pivote post_tag
CREATE TABLE post_tag (
  id SERIAL PRIMARY KEY,
  post_id INTEGER NOT NULL REFERENCES posts(id) ON DELETE CASCADE,
  tag_id INTEGER NOT NULL REFERENCES tags(id) ON DELETE CASCADE,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

-- Spatie laravel-permission tables

CREATE TABLE roles (
  id SERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  guard_name VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE permissions (
  id SERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  guard_name VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE model_has_permissions (
  permission_id INTEGER NOT NULL REFERENCES permissions(id) ON DELETE CASCADE,
  model_type VARCHAR(255) NOT NULL,
  model_id INTEGER NOT NULL,
  PRIMARY KEY(permission_id, model_id, model_type)
);

CREATE TABLE model_has_roles (
  role_id INTEGER NOT NULL REFERENCES roles(id) ON DELETE CASCADE,
  model_type VARCHAR(255) NOT NULL,
  model_id INTEGER NOT NULL,
  PRIMARY KEY(role_id, model_id, model_type)
);

CREATE TABLE role_has_permissions (
  permission_id INTEGER NOT NULL REFERENCES permissions(id) ON DELETE CASCADE,
  role_id INTEGER NOT NULL REFERENCES roles(id) ON DELETE CASCADE,
  PRIMARY KEY(permission_id, role_id)
);

-- Insertar permisos
INSERT INTO permissions (name, guard_name, created_at, updated_at) VALUES
('create posts', 'web', NOW(), NOW()),
('edit posts', 'web', NOW(), NOW()),
('delete posts', 'web', NOW(), NOW()),
('publish posts', 'web', NOW(), NOW()),
('manage comments', 'web', NOW(), NOW()),
('manage tags', 'web', NOW(), NOW());

-- Insertar roles
INSERT INTO roles (name, guard_name, created_at, updated_at) VALUES
('Admin', 'web', NOW(), NOW()),
('Editor', 'web', NOW(), NOW()),
('User', 'web', NOW(), NOW());

-- Asignar todos los permisos al role Admin
INSERT INTO role_has_permissions (permission_id, role_id)
SELECT p.id, r.id FROM permissions p, roles r WHERE r.name = 'Admin';

-- Asignar solo ciertos permisos al role Editor
INSERT INTO role_has_permissions (permission_id, role_id)
SELECT p.id, r.id FROM permissions p, roles r 
WHERE r.name = 'Editor' AND p.name IN ('create posts', 'edit posts', 'publish posts', 'manage comments', 'manage tags');
