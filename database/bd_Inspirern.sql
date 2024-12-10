-- Create the database
CREATE DATABASE IF NOT EXISTS inspire_rn;

-- Use the database
USE inspire_rn;

-- Table `users`
CREATE TABLE IF NOT EXISTS `users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `type` VARCHAR(255) DEFAULT 'turista',
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `email_verified_at` TIMESTAMP NULL,
  `city` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) ENGINE=InnoDB;

-- Table `password_reset_tokens`
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` VARCHAR(255) NOT NULL PRIMARY KEY,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL
) ENGINE=InnoDB;

-- Inserir usuários
INSERT INTO users (name, type, email, email_verified_at, city, password, remember_token, created_at, updated_at) VALUES
('Admin User', 'admin', 'admin@example.com', NOW(), 'Natal', '$2y$12$IH1VVLvPhNpz/gi0Ljc1FeTaFcdbWoT7wnzRkM0NDRoBQq4w2av3q', NULL, NOW(), NOW()), -- senha: 12345678
('Tourist User', 'turista', 'tourist@example.com', NOW(), 'Mossoró', '$2y$12$IH1VVLvPhNpz/gi0Ljc1FeTaFcdbWoT7wnzRkM0NDRoBQq4w2av3q', NULL, NOW(), NOW()); -- senha: 12345678

-- Table `sessions`
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` VARCHAR(255) NOT NULL PRIMARY KEY,
  `user_id` BIGINT UNSIGNED NULL,
  `ip_address` VARCHAR(45) NULL,
  `user_agent` TEXT NULL,
  `payload` LONGTEXT NOT NULL,
  `last_activity` INT NOT NULL,
  INDEX `sessions_user_id_index` (`user_id`),
  INDEX `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB;

-- Table `businesses`
CREATE TABLE IF NOT EXISTS `businesses` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `businessName` VARCHAR(255) NOT NULL,
  `category` VARCHAR(255) NOT NULL,
  `cnpj` CHAR(18) NOT NULL UNIQUE,
  `description` TEXT NOT NULL,
  `phone` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `websiteURL` VARCHAR(255) NULL,
  `road` VARCHAR(255) NOT NULL,
  `number` VARCHAR(255) NOT NULL,
  `cep` CHAR(9) NOT NULL,
  `neighborhood` VARCHAR(255) NOT NULL,
  `city` VARCHAR(255) NOT NULL,
  `state` VARCHAR(255) NOT NULL,
  `operatingSchedule` JSON NOT NULL,
  `locationPhoto` VARCHAR(255) NOT NULL,
  `ownerName` VARCHAR(255) NOT NULL,
  `ownerTelephone` VARCHAR(255) NOT NULL,
  `ownerEmail` VARCHAR(255) NOT NULL UNIQUE,
  `ownerCpf` CHAR(14) NOT NULL UNIQUE,
  `status` VARCHAR(255) DEFAULT 'pendente',
  `ratingBusiness` TEXT NULL,
  `registrationDate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `user_id` BIGINT UNSIGNED NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;


-- insert business 1
INSERT INTO `businesses` (
  `businessName`, `category`, `cnpj`, `description`, `phone`, `email`, 
  `websiteURL`, `road`, `number`, `cep`, `neighborhood`, `city`, `state`, 
  `operatingSchedule`, `locationPhoto`, `ownerName`, `ownerTelephone`, 
  `ownerEmail`, `ownerCpf`, `user_id`
) VALUES (
  'Açougue Carne Boa', 'Açougue', '12.375.688/8688-76', 'Esse lugar é muito bom, meu, só carne de qualidade.', '(84) 99633-5778', 'carneboa@gmail.com',
  'https://carneboa.bom.br', 'bitiqueiro', '05', '77243-990', 'Centro', 'Ouro Branco', 'Rio Grande do Norte',
  '[{"day":"Segunda","opening_time":"08:00","closing_time":"18:00"},{"day":"Terça","opening_time":"08:00","closing_time":"18:00"},{"day":"Quarta","opening_time":"08:00","closing_time":"18:00"},{"day":"Quinta","opening_time":"08:00","closing_time":"18:00"},{"day":"Sexta","opening_time":"08:00","closing_time":"18:00"}]', 
  'business/dPlf520OiBgcNtpC5YeZ0CqapgZi9sHIX11h7cKr.jpg', 'José Filipino Dantas', '(84) 99633-5778',
  'filipe@gmail.com', '709.365.920-20', 1
);

-- insert business 2
INSERT INTO `businesses` (
  `businessName`, `category`, `cnpj`, `description`, `phone`, `email`, 
  `websiteURL`, `road`, `number`, `cep`, `neighborhood`, `city`, `state`, 
  `operatingSchedule`, `locationPhoto`, `ownerName`, `ownerTelephone`, 
  `ownerEmail`, `ownerCpf`, `user_id`
) VALUES (
  'Padaria Pão Bom', 'Padaria', '98.765.432/0001-10', 'Os melhores pães da região.', '(84) 98765-4321', 'paobom@gmail.com',
  'https://paobom.com.br', 'Rua das Flores', '123', '59000-000', 'Centro', 'Natal', 'Rio Grande do Norte',
  '[{"day":"Segunda","opening_time":"06:00","closing_time":"20:00"},{"day":"Terça","opening_time":"06:00","closing_time":"20:00"},{"day":"Quarta","opening_time":"06:00","closing_time":"20:00"},{"day":"Quinta","opening_time":"06:00","closing_time":"20:00"},{"day":"Sexta","opening_time":"06:00","closing_time":"20:00"}]', 
  'business/WQV754IUPoUC6HEhuocZaEgPMehUxVKCRQBI3Nrj.jpg', 'Maria Silva', '(84) 98765-4321',
  'maria@gmail.com', '123.456.789-10', 1
);

-- insert business 3
INSERT INTO `businesses` (
  `businessName`, `category`, `cnpj`, `description`, `phone`, `email`, 
  `websiteURL`, `road`, `number`, `cep`, `neighborhood`, `city`, `state`, 
  `operatingSchedule`, `locationPhoto`, `ownerName`, `ownerTelephone`, 
  `ownerEmail`, `ownerCpf`, `user_id`
) VALUES (
  'Lanchonete Boa Fome', 'Lanchonete', '11.111.111/0001-11', 'Deliciosos lanches rápidos e saborosos.', '(84) 99888-7766', 'boafome@gmail.com',
  'https://boafome.com.br', 'Avenida Principal', '321', '59000-111', 'Alecrim', 'Natal', 'Rio Grande do Norte',
  '[{"day":"Segunda","opening_time":"09:00","closing_time":"22:00"},{"day":"Terça","opening_time":"09:00","closing_time":"22:00"},{"day":"Quarta","opening_time":"09:00","closing_time":"22:00"},{"day":"Quinta","opening_time":"09:00","closing_time":"22:00"},{"day":"Sexta","opening_time":"09:00","closing_time":"22:00"}]', 
  'business/WAYHhI5woPC8sWXMbg3YZJicIqUimNmtOjjVai0N.jpg', 'João Pereira', '(84) 99888-7766',
  'joao@gmail.com', '987.654.321-00', 1
);

-- insert business 4
INSERT INTO `businesses` (
  `businessName`, `category`, `cnpj`, `description`, `phone`, `email`, 
  `websiteURL`, `road`, `number`, `cep`, `neighborhood`, `city`, `state`, 
  `operatingSchedule`, `locationPhoto`, `ownerName`, `ownerTelephone`, 
  `ownerEmail`, `ownerCpf`, `user_id`
) VALUES (
  'Sorveteria Frio Gostoso', 'Sorveteria', '22.222.222/0001-22', 'Os melhores sorvetes artesanais da cidade.', '(84) 99999-1234', 'friogostoso@gmail.com',
  'https://friogostoso.com.br', 'Rua do Sorvete', '222', '59000-222', 'Ponta Negra', 'Natal', 'Rio Grande do Norte',
  '[{"day":"Segunda","opening_time":"10:00","closing_time":"22:00"},{"day":"Terça","opening_time":"10:00","closing_time":"22:00"},{"day":"Quarta","opening_time":"10:00","closing_time":"22:00"},{"day":"Quinta","opening_time":"10:00","closing_time":"22:00"},{"day":"Sexta","opening_time":"10:00","closing_time":"22:00"}]', 
  'business/hoK9KwmaRe1DRw5uA2jx97IbzX9xvsCMvVs8UiLV.webp', 'Ana Souza', '(84) 99999-1234',
  'ana@gmail.com', '111.222.333-44', 1
);

-- Table `social_medias`
CREATE TABLE IF NOT EXISTS `social_medias` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `business_id` BIGINT UNSIGNED NOT NULL,
  `socialMediaName` VARCHAR(255) NOT NULL,
  `socialMediaURL` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  FOREIGN KEY (`business_id`) REFERENCES `businesses`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Table `reviews`
CREATE TABLE IF NOT EXISTS reviews (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    comment TEXT NOT NULL,  -- Comentário da avaliação
    numberStars INT NOT NULL,  -- Avaliação em estrelas
    
    -- Chave estrangeira para a tabela de usuários
    user_id BIGINT UNSIGNED NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,

    -- Chave estrangeira para a tabela de negócios
    business_id BIGINT UNSIGNED NOT NULL,
    FOREIGN KEY (business_id) REFERENCES businesses(id) ON DELETE CASCADE,

    -- Campos de timestamps
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

-- Table `cities`
CREATE TABLE IF NOT EXISTS `cities` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) ENGINE=InnoDB;

-- Insert cities in RN
INSERT INTO `cities` (`name`) VALUES
('Acari'), ('Açu'), ('Afonso Bezerra'), ('Água Nova'), ('Alexandria'),
('Almino Afonso'), ('Alto do Rodrigues'), ('Angicos'), ('Antônio Martins'),
('Apodi'), ('Areia Branca'), ('Arês'), ('Augusto Severo'), ('Baía Formosa'),
('Baraúna'), ('Barcelona'), ('Bento Fernandes'), ('Bodó'), ('Bom Jesus'),
('Brejinho'), ('Caiçara do Norte'), ('Caiçara do Rio do Vento'), ('Caicó'),
('Campo Redondo'), ('Canguaretama'), ('Caraúbas'), ('Carnaúba dos Dantas'),
('Carnaubais'), ('Ceará-Mirim'), ('Cerro Corá'), ('Coronel Ezequiel'),
('Coronel João Pessoa'), ('Cruzeta'), ('Currais Novos'), ('Doutor Severiano'),
('Encanto'), ('Equador'), ('Espírito Santo'), ('Extremoz'), ('Felipe Guerra'),
('Fernando Pedroza'), ('Florânia'), ('Francisco Dantas'), ('Frutuoso Gomes'),
('Galinhos'), ('Goianinha'), ('Governador Dix-Sept Rosado'), ('Grossos'),
('Guamaré'), ('Ielmo Marinho'), ('Ipanguaçu'), ('Ipueira'), ('Itajá'),
('Itaú'), ('Jaçanã'), ('Jandaíra'), ('Janduís'), ('Januário Cicco'),
('Japi'), ('Jardim de Angicos'), ('Jardim de Piranhas'), ('Jardim do Seridó'),
('João Câmara'), ('João Dias'), ('José da Penha'), ('Jucurutu'), ('Jundiá'),
('Lagoa d\'Anta'), ('Lagoa de Pedras'), ('Lagoa de Velhos'), ('Lagoa Nova'),
('Lagoa Salgada'), ('Lajes'), ('Lajes Pintadas'), ('Lucrécia'), ('Luís Gomes'),
('Macaíba'), ('Macau'), ('Major Sales'), ('Marcelino Vieira'), ('Martins'),
('Maxaranguape'), ('Messias Targino'), ('Montanhas'), ('Monte Alegre'),
('Monte das Gameleiras'), ('Mossoró'), ('Natal'), ('Nísia Floresta'),
('Nova Cruz'), ('Olho-d\'Água do Borges'), ('Ouro Branco'), ('Paraná'),
('Paraú'), ('Parazinho'), ('Parelhas'), ('Parnamirim'), ('Passa e Fica'),
('Passagem'), ('Patu'), ('Pau dos Ferros'), ('Pedra Grande'), ('Pedra Preta'),
('Pedro Avelino'), ('Pedro Velho'), ('Pendências'), ('Pilões'),
('Poço Branco'), ('Portalegre'), ('Porto do Mangue'), ('Presidente Juscelino'),
('Pureza'), ('Rafael Fernandes'), ('Rafael Godeiro'), ('Riacho da Cruz'),
('Riacho de Santana'), ('Riachuelo'), ('Rio do Fogo'), ('Rodolfo Fernandes'),
('Ruy Barbosa'), ('Santa Cruz'), ('Santa Maria'), ('Santana do Matos'),
('Santana do Seridó'), ('Santo Antônio'), ('São Bento do Norte'),
('São Bento do Trairí'), ('São Fernando'), ('São Francisco do Oeste'),
('São Gonçalo do Amarante'), ('São João do Sabugi'), ('São José de Mipibu'),
('São José do Campestre'), ('São José do Seridó'), ('São Miguel'),
('São Miguel do Gostoso'), ('São Paulo do Potengi'), ('São Pedro'),
('São Rafael'), ('São Tomé'), ('São Vicente'), ('Senador Elói de Souza'),
('Senador Georgino Avelino'), ('Serra de São Bento'), ('Serra do Mel'),
('Serra Negra do Norte'), ('Serrinha'), ('Serrinha dos Pintos'),
('Severiano Melo'), ('Sítio Novo'), ('Taboleiro Grande'), ('Taipu'),
('Tangará'), ('Tenente Ananias'), ('Tenente Laurentino Cruz'), ('Tibau'),
('Tibau do Sul'), ('Timbaúba dos Batistas'), ('Touros'), ('Triunfo Potiguar'),
('Umarizal'), ('Upanema'), ('Várzea'), ('Venha-Ver'), ('Vera Cruz'),
('Viçosa'), ('Vila Flor');

-- Table `accommodations`
CREATE TABLE IF NOT EXISTS `accommodations` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `city` VARCHAR(255) NOT NULL,
  `state` VARCHAR(255) NOT NULL,
  `zip` CHAR(9) NOT NULL,
  `phone` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `website` VARCHAR(255) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) ENGINE=InnoDB;

-- Table `rooms`
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `accommodation_id` BIGINT UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `price` DECIMAL(10, 2) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  FOREIGN KEY (`accommodation_id`) REFERENCES `accommodations`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Table `tourist_spots`
CREATE TABLE IF NOT EXISTS `tourist_spots` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `city` VARCHAR(255) NOT NULL,
  `state` VARCHAR(255) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `zip` CHAR(9) NOT NULL,
  `phone` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `website` VARCHAR(255) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) ENGINE=InnoDB;

-- Table `services`
CREATE TABLE IF NOT EXISTS `services` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) ENGINE=InnoDB;

-- Table `restaurant`
CREATE TABLE IF NOT EXISTS `restaurant` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `city` VARCHAR(255) NOT NULL,
  `state` VARCHAR(255) NOT NULL,
  `zip` CHAR(9) NOT NULL,
  `phone` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `website` VARCHAR(255) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) ENGINE=InnoDB;
