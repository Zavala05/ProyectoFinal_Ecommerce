CREATE DATABASE tech_store;

USE tech_store;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
    category VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertar algunos datos de ejemplo
INSERT INTO products (name, description, price, image, category) VALUES
('Laptop HP Pavilion', 'Laptop con procesador Intel Core i5, 8GB RAM, 512GB SSD', 899.99, 'laptop-hp.jpg', 'Laptops'),
('Smartphone Samsung Galaxy S21', 'Pantalla 6.2", 128GB almacenamiento, 8GB RAM', 799.99, 'samsung-s21.jpg', 'Smartphones'),
('Monitor LG 24"', 'Monitor Full HD 24 pulgadas, 75Hz, IPS', 179.99, 'monitor-lg.jpg', 'Monitores'),
('Teclado Mecánico HyperX Alloy FPS Pro', 'Teclado mecánico, switches Cherry MX Red, TKL', 89.99, 'teclado-hyperx.jpg', 'Accesorios PC'),
('Mouse Logitech G502 HERO', 'Mouse gaming, 25600 DPI, 11 botones programables', 49.99, 'mouse-logitech.jpg', 'Accesorios PC'),
('Auriculares Sony WH-1000XM4', 'Auriculares con cancelación de ruido, Bluetooth, 30h batería', 349.99, 'auriculares-sony.jpg', 'Audio'),
('Tableta Apple iPad Air', 'Pantalla Liquid Retina 10.9", Chip A14 Bionic, 64GB', 599.99, 'ipad-air.jpg', 'Tabletas'),
('Impresora HP OfficeJet Pro', 'Impresora multifunción, inyección de tinta, Wi-Fi', 249.99, 'impresora-hp.jpg', 'Impresoras'),
('Disco Duro Externo Seagate 2TB', 'Disco duro portátil USB 3.0, 2TB capacidad', 69.99, 'disco-seagate.jpg', 'Almacenamiento'),
('Router TP-Link Archer AX50', 'Router Wi-Fi 6, doble banda, velocidades gigabit', 129.99, 'router-tp-link.jpg', 'Redes'),
('Cámara Nikon D3500', 'Cámara DSLR, 24.2 MP, kit lente 18-55mm', 499.99, 'camara-nikon.jpg', 'Cámaras'),
('Smart TV Samsung Crystal UHD 55"', 'Televisor 4K UHD, HDR, Smart TV Tizen', 549.99, 'tv-samsung.jpg', 'Televisores'),
('Consola Nintendo Switch', 'Consola híbrida, Joy-Con, base para TV', 299.99, 'nintendo-switch.jpg', 'Consolas'),
('Smartwatch Apple Watch Series 7', 'Smartwatch, GPS, monitorización salud, resistencia al agua', 399.99, 'apple-watch.jpg', 'Wearables'),
('Laptop Dell XPS 13', 'Laptop ultradelgada con Intel Core i7, 16GB RAM, 1TB SSD', 1299.99, 'laptop-dell.jpg', 'Laptops'),
('Smartphone iPhone 13 Pro', 'Pantalla Super Retina XDR, Chip A15 Bionic, 256GB', 1099.99, 'iphone-13-pro.jpg', 'Smartphones'),
('Monitor Samsung Odyssey G9', 'Monitor curvo ultrawide 49", 240Hz, 1ms', 1499.99, 'monitor-samsung-g9.jpg', 'Monitores'),
('Teclado Inalámbrico Logitech MX Keys', 'Teclado retroiluminado, multidispositivo, recargable', 99.99, 'teclado-logitech-mx.jpg', 'Accesorios PC'),
('Mouse Gaming Razer DeathAdder V2', 'Mouse ergonómico, sensor óptico 20000 DPI, 8 botones', 69.99, 'mouse-razer.jpg', 'Accesorios PC'),
('Auriculares Bose QuietComfort 35 II', 'Auriculares con cancelación de ruido, control por voz', 299.99, 'auriculares-bose.jpg', 'Audio'),
('Tableta Samsung Galaxy Tab S7', 'Pantalla 11", Snapdragon 865+, S Pen incluido', 649.99, 'galaxy-tab-s7.jpg', 'Tabletas'),
('Impresora Brother MFC-L2710DW', 'Impresora láser monocromática, multifunción, Wi-Fi', 219.99, 'impresora-brother.jpg', 'Impresoras'),
('SSD Externo Samsung T7 1TB', 'SSD portátil USB 3.2 Gen 2, velocidades rápidas', 129.99, 'ssd-samsung-t7.jpg', 'Almacenamiento'),
('Sistema Wi-Fi Mesh Netgear Orbi RBK752', 'Sistema Wi-Fi 6 Mesh, cobertura 5000 sq ft, hasta 4.2 Gbps', 399.99, 'router-netgear-orbi.jpg', 'Redes'),
('Cámara Sony Alpha a7 III', 'Cámara Mirrorless Full-Frame, 24.2 MP, video 4K', 1999.99, 'camara-sony-a7iii.jpg', 'Cámaras'),
('Smart TV LG C1 OLED 65"', 'Televisor OLED 4K, AI ThinQ, webOS', 1799.99, 'tv-lg-c1.jpg', 'Televisores'),
('Consola PlayStation 5', 'Consola de última generación, SSD ultrarrápido, gráficos 4K', 499.99, 'ps5.jpg', 'Consolas'),
('Smartwatch Garmin Fenix 7', 'Smartwatch GPS multideporte, batería de larga duración, métricas avanzadas', 699.99, 'garmin-fenix-7.jpg', 'Wearables'),
('Altavoz Inteligente Amazon Echo Dot (4ta Gen)', 'Altavoz con Alexa, sonido mejorado, diseño esférico', 49.99, 'echo-dot.jpg', 'Audio'),
('Cámara de Seguridad Arlo Pro 4 Spotlight', 'Cámara de seguridad inalámbrica, 2K HDR, visión nocturna a color', 199.99, 'arlo-pro-4.jpg', 'Seguridad y Hogar Inteligente'),
('Termostato Inteligente Google Nest Learning', 'Termostato programable, aprende tus preferencias, control desde app', 249.99, 'nest-thermostat.jpg', 'Seguridad y Hogar Inteligente'),
('Bombilla Inteligente Philips Hue White and Color', 'Bombilla LED inteligente, millones de colores, control por voz', 49.99, 'philips-hue.jpg', 'Seguridad y Hogar Inteligente'),
('Timbre con Video Ring Video Doorbell Pro 2', 'Timbre con cámara 1536p HD, detección de movimiento 3D, audio bidireccional', 249.99, 'ring-doorbell-pro2.jpg', 'Seguridad y Hogar Inteligente'),
('Extensor de Rango Wi-Fi Netgear Nighthawk EX7700', 'Extensor tribanda, hasta 2200 Mbps, puerto Gigabit Ethernet', 119.99, 'extensor-netgear.jpg', 'Redes'),
('Cargador Inalámbrico Anker PowerWave Stand', 'Cargador inalámbrico rápido para smartphones, soporte vertical/horizontal', 29.99, 'cargador-anker.jpg', 'Accesorios Móviles'),
('Batería Externa Anker PowerCore III Elite 25600', 'Power bank de 25600mAh, carga rápida USB-C PD', 99.99, 'powerbank-anker.jpg', 'Accesorios Móviles'),
('Tarjeta Gráfica NVIDIA GeForce RTX 3080', 'Tarjeta gráfica de alto rendimiento para gaming y diseño', 799.99, 'rtx-3080.jpg', 'Componentes PC'),
('Procesador Intel Core i9-12900K', 'Procesador de 12ª generación, 16 núcleos, 24 hilos', 549.99, 'intel-i9-12900k.jpg', 'Componentes PC'),
('Memoria RAM Corsair Vengeance RGB Pro 16GB', 'Kit de 2x8GB DDR4 3200MHz, iluminación RGB personalizable', 79.99, 'ram-corsair-rgb.jpg', 'Componentes PC'),
('Placa Base ASUS ROG Strix Z690-F Gaming WiFi', 'Placa base ATX, socket LGA 1700, Wi-Fi 6E', 299.99, 'placa-asus-z690.jpg', 'Componentes PC'),
('Laptop Lenovo Legion 5', 'Laptop gaming con AMD Ryzen 7, RTX 3060, 16GB RAM, 1TB SSD', 1199.99, 'lenovo-legion5.jpg', 'Laptops'),
('Smartphone Google Pixel 7', 'Pantalla AMOLED 6.3", Tensor G2, 128GB, cámara 50MP', 599.99, 'pixel-7.jpg', 'Smartphones'),
('Monitor Asus ProArt 27"', 'Monitor 4K IPS, 100% sRGB, calibrado de fábrica', 449.99, 'monitor-asus-proart.jpg', 'Monitores'),
('Teclado Gaming Corsair K95 RGB', 'Mecánico, switches Cherry MX Speed, retroiluminado RGB, macros', 169.99, 'corsair-k95.jpg', 'Accesorios PC'),
('Mouse Inalámbrico Logitech MX Master 3', 'Ergonómico, sensor Darkfield 4000 DPI, rueda MagSpeed', 99.99, 'mx-master3.jpg', 'Accesorios PC'),
('Auriculares SteelSeries Arctis 7P', 'Inalámbricos para PS5, audio 3D, micrófono ClearCast', 149.99, 'arctis-7p.jpg', 'Audio'),
('Tableta Microsoft Surface Pro 8', 'Pantalla 13", Intel Core i5, 8GB RAM, 256GB SSD, teclado incluido', 999.99, 'surface-pro8.jpg', 'Tabletas'),
('Impresora Canon PIXMA TS3350', 'Multifunción tinta, Wi-Fi, impresión móvil', 89.99, 'canon-ts3350.jpg', 'Impresoras'),
('Disco Duro Externo WD 4TB My Passport', 'Portátil USB 3.2, protección con contraseña, 4TB', 109.99, 'wd-my-passport.jpg', 'Almacenamiento'),
('Router ASUS AX6000 RT-AX88U', 'Wi-Fi 6, 8 puertos Gigabit, para gaming', 349.99, 'asus-ax6000.jpg', 'Redes'),
('Cámara Canon EOS M50 Mark II', 'Mirrorless, 24.1 MP, grabación 4K, pantalla abatible', 699.99, 'canon-m50mk2.jpg', 'Cámaras'),
('Smart TV TCL 4K 50"', 'UHD HDR, Google TV, Dolby Vision/Atmos', 379.99, 'tcl-4k-50.jpg', 'Televisores'),
('Consola Xbox Series S', 'Compacta, SSD 512GB, resolución 1440p, Game Pass', 299.99, 'xbox-series-s.jpg', 'Consolas'),
('Smartwatch Fitbit Sense 2', 'Avanzado monitoreo de salud, ECG, GPS', 299.99, 'fitbit-sense2.jpg', 'Wearables'),
('Altavoz Sonos Roam', 'Portátil, Wi-Fi/Bluetooth, resistencia IP67, sonido 360°', 179.99, 'sonos-roam.jpg', 'Audio'),
('Cámara de Seguridad Blink Mini', 'Compacta, 1080p, visión nocturna, compatible con Alexa', 34.99, 'blink-mini.jpg', 'Seguridad y Hogar Inteligente'),
('Silla Gaming Secretlab Titan Evo', 'Ergonómica, cuero sintético, soporte lumbar ajustable', 499.99, 'secretlab-titan.jpg', 'Accesorios PC'),
('Base Refrigerante para Laptop Cooler Master NotePal X3', 'Ventilador 200mm, iluminación azul, hasta 17"', 39.99, 'cooler-master-x3.jpg', 'Accesorios PC'),
('Proyector Epson Home Cinema 880', 'Full HD 1080p, 3300 lúmenes, HDMI, USB', 599.99, 'epson-880.jpg', 'Cámaras'),
('Cargador USB-C Anker PowerPort III 65W', 'Carga rápida para laptop/smartphone, 3 puertos', 49.99, 'anker-65w.jpg', 'Accesorios Móviles');
DELETE FROM products ;

-- Tabla principal de pedidos
CREATE TABLE `orders` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `order_number` VARCHAR(20) NOT NULL UNIQUE,
  `transaction_id` VARCHAR(50) NOT NULL,
  `user_id` INT NULL,
  `customer_name` VARCHAR(100) NOT NULL,
  `customer_email` VARCHAR(100) NOT NULL,
  `total_amount` DECIMAL(10,2) NOT NULL,
  `status` ENUM('pending','completed','cancelled') DEFAULT 'completed',
  `payment_method` VARCHAR(20) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de items de pedido
CREATE TABLE `order_items` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `order_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  `product_name` VARCHAR(100) NOT NULL,
  `unit_price` DECIMAL(10,2) NOT NULL,
  `quantity` INT NOT NULL
) ENGINE=InnoDB;

-- Añade las FK después:
ALTER TABLE `order_items` 
ADD CONSTRAINT `fk_order` 
FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`) ON DELETE CASCADE;

