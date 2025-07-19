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
('Placa Base ASUS ROG Strix Z690-F Gaming WiFi', 'Placa base ATX, socket LGA 1700, Wi-Fi 6E', 299.99, 'placa-asus-z690.jpg', 'Componentes PC');
DELETE FROM products ;