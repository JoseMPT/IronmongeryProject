CREATE DATABASE hardware_store_es;
USE hardware_store_es;

DROP TABLE IF EXISTS `users_data`;
DROP TABLE IF EXISTS `types_users`;
DROP TABLE IF EXISTS `products_data`;
DROP TABLE IF EXISTS `sale_data`;
DROP TABLE IF EXISTS `report_type`;
DROP TABLE IF EXISTS `inventory`;
DROP TABLE IF EXISTS `buy_products`;
DROP TABLE IF EXISTS `ticket_sale`;


CREATE TABLE `users_data` (
`user_name1` VARCHAR(50) NOT NULL COMMENT 'Primer nombre de usuario (obligatorio).',
`user_name2` VARCHAR(50) COMMENT 'Segundo nombre de usuario (opcional).',
`user_lastname1` VARCHAR(50) NOT NULL COMMENT 'Primer apellido de usuario (obligatorio).',
`user_lastname2` VARCHAR(50) COMMENT 'Segundo apellido de usuario (opcional).',
`user_email` VARCHAR(50) NOT NULL COMMENT 'Email de usuario (clave obligatoria y única).',
`user_password` VARCHAR(50) NOT NULL COMMENT 'Contraseña de usuario (obligatoria).',
`user_type` INT UNSIGNED NOT NULL COMMENT 'Tipo de usuario.',
PRIMARY KEY (`user_email`))
COMMENT = 'Datos principales de los usuarios.';

CREATE TABLE `types_users` (
`type_id` INT UNSIGNED PRIMARY KEY COMMENT 'Tipo de usuario existente en el sitio.',
`type_name` VARCHAR(50) NOT NULL COMMENT 'Nombre del tipo de usuario.',
`type_description` TEXT(500) NOT NULL COMMENT 'Descripción del tipo de usuario.')
COMMENT = 'Tipos de usuario y la descripción que le corresponde.';

CREATE TABLE `products_data` (
`product_id` VARCHAR(10) PRIMARY KEY COMMENT 'ID de identificación del producto.',
`product_name` VARCHAR(100) NOT NULL COMMENT 'Nombre del producto.',
`product_description` TEXT(1000) NOT NULL COMMENT 'Descripción del producto.',
`product_unitCost` DECIMAL(9,2) NOT NULL COMMENT 'Costo por unidad de producto.',
`inventory_amount` INT UNSIGNED NOT NULL COMMENT 'Cantidad de producto en inventario.',
`product_inventory` INT UNSIGNED COMMENT 'ID del inventario al que pertenece el producto.',
`product_reportId` INT UNSIGNED COMMENT 'ID del tipo de reporte al que pertenece cada producto.')
COMMENT = 'Datos generales de los productos y su cantidad en inventario.';

CREATE TABLE `sale_data` (
`sale_productId` VARCHAR(10) COMMENT 'ID del producto a comprar.',
`sale_amount` INT NOT NULL DEFAULT 1 COMMENT 'Monto o cantidad de unidades a comprar de un producto.',
`sale_buy` INT UNSIGNED COMMENT 'ID del conjunto de compra al que corresponde el producto.',
`sale_total` DECIMAL(9,2) NOT NULL COMMENT 'Total a pagar por la cantidad de producto seleccionado.',
`sale_bought` TINYINT NOT NULL DEFAULT 0 COMMENT 'Estado de la venta: 0 no vendido, 1 vendido.',
`sale_id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT 'ID de las ventas realizadas y por realizar.')
COMMENT = 'Esta tabla registra los productos vendidos, su cantidad y el total para cada uno. Adicionalmente se relaciona con tipo de reporte para elaborar un reporte posterior.';

CREATE TABLE `report_type` (
`report_id` INT UNSIGNED PRIMARY KEY COMMENT 'Tipo de reporte a realizar.',
`report_name` VARCHAR(100) NOT NULL COMMENT 'Nombre del reporte.',
`report_time` VARCHAR(30) NOT NULL COMMENT 'Tiempo del que se hace el reporte (semanal, mensual, anual).',
`report_description` TEXT(500) COMMENT 'Descripción de como hacer el reporte.')
COMMENT = 'Tipo de reportes a elaborar.';

CREATE TABLE `inventory` (
`inventory_id` INT UNSIGNED PRIMARY KEY COMMENT 'Tipo de inventario.',
`inventory_name` VARCHAR(50) NOT NULL UNIQUE COMMENT 'Nombre del tipo de inventario.',
`inventory_description` TEXT(500) NOT NULL COMMENT 'Descripción de los productos que contiene el inventario.')
COMMENT = 'Tipos de inventarios existentes (materiales, productos, herramientas, servicio, etc).';

CREATE TABLE `buy_products` (
`buy_id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT 'ID del conjunto de compra.',
`buy_user` VARCHAR(50) COMMENT 'Usuario que compra los productos.')
COMMENT = 'Aquí se registra el conjunto de productos vendidos a un usuario.';

CREATE TABLE `ticket_sale` (
`ticket_buyId` INT UNSIGNED COMMENT 'ID del carrito al que corresponde el ticket.',
`ticket_total` DECIMAL(9,2) NOT NULL COMMENT 'Total pagado.',
`ticket_date` VARCHAR(10) NOT NULL COMMENT 'Fecha de emisión del ticket.',
`ticket_hour` TIME NOT NULL COMMENT 'Hora de emisión del ticket.',
`ticket_id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'ID de ticket (valor único).')
COMMENT = 'Datos a generar un ticket una vez la compra fue efectuada.';

ALTER TABLE `users_data` ADD CONSTRAINT `fk_users_data_user_type_types_users_type_id` FOREIGN KEY (`user_type`) REFERENCES `types_users`(`type_id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `products_data` ADD CONSTRAINT `fk_products_data_product_inventory_inventory_inventory_id` FOREIGN KEY (`product_inventory`) REFERENCES `inventory`(`inventory_id`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `products_data` ADD CONSTRAINT `fk_products_data_product_reportId_report_type_report_id` FOREIGN KEY (`product_reportId`) REFERENCES `report_type`(`report_id`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `sale_data` ADD CONSTRAINT `fk_sale_data_sale_productId_products_data_product_id` FOREIGN KEY (`sale_productId`) REFERENCES `products_data`(`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `sale_data` ADD CONSTRAINT `fk_sale_data_sale_buy_buy_products_buy_id` FOREIGN KEY (`sale_buy`) REFERENCES `buy_products`(`buy_id`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `buy_products` ADD CONSTRAINT `fk_buy_products_buy_user_users_data_user_email` FOREIGN KEY (`buy_user`) REFERENCES `users_data`(`user_email`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `ticket_sale` ADD CONSTRAINT `fk_ticket_sale_ticket_buyId_buy_products_buy_id` FOREIGN KEY (`ticket_buyId`) REFERENCES `buy_products`(`buy_id`) ON DELETE CASCADE ON UPDATE CASCADE;






DELIMITER **
CREATE TRIGGER create_shopping_cart AFTER INSERT ON users_data FOR EACH ROW
    BEGIN
        IF NEW.user_type = 1 THEN
            INSERT INTO buy_products VALUES (NULL, NEW.user_email);
        END IF;
    END **


DELIMITER **
CREATE PROCEDURE insert_sale_data (IN saleID VARCHAR(10), IN saleAmount INT, IN saleBuy INT) NOT DETERMINISTIC
    BEGIN
        DECLARE cost DECIMAL(9,2);
        DECLARE total DECIMAL(9,2);
        SELECT product_unitCost INTO cost FROM products_data WHERE product_id = saleID;
        SET total = saleAmount * cost;
        IF saleID IN (SELECT sale_productId FROM sale_data)
               AND 0 = (SELECT sale_bought FROM sale_data WHERE saleID = sale_productId AND sale_bought = FALSE)
            THEN
            UPDATE sale_data SET sale_amount = saleAmount, sale_total = total WHERE sale_productId = saleID AND sale_bought = FALSE;
                ELSE
            INSERT INTO sale_data VALUES (saleID, saleAmount, saleBuy, total, 0, NULL);
        END IF;
    END **

DELIMITER **
CREATE PROCEDURE delete_sale_data(IN product VARCHAR(50), IN ID_buy INT)
BEGIN
    DELETE FROM sale_data WHERE sale_productId = product AND sale_buy = ID_buy AND sale_bought = 0;
END **


DELIMITER **
CREATE PROCEDURE make_purchase (IN cartID INT) NOT DETERMINISTIC
    BEGIN
        DECLARE cost_total DECIMAL(9,2);
        SET cost_total = (SELECT SUM(sale_total) FROM sale_data WHERE sale_buy = cartID AND sale_bought = FALSE);
        INSERT INTO ticket_sale VALUES (cartID, cost_total, DATE_FORMAT(CURRENT_DATE(), '%d/%m/%Y'), CURRENT_TIME(), NULL);
        UPDATE sale_data SET sale_bought = TRUE WHERE sale_buy = cartID AND sale_bought = FALSE;
    END **



INSERT INTO inventory VALUES (1, 'HERRAMIENTAS', 'Aquí encontrará todo tipo de productos de buena calidad.'),
                             (2, 'MATERIALES DE CONSTRUCCIÓN', 'Todo tipo de materiales de construcción a su alcance.');

INSERT INTO types_users VALUES (1, 'CLIENT', 'Es un usuario que está registrado en la base de datos, capaz de ver, seleccionar y comprar productos.'),
                               (2, 'EMPLOYEE', 'Empleado con permisos específicos seleccionados por el administrador.'),
                               (3, 'ADMIN', 'Usuario con prácticamente todos los permisos en el sitio web.'),
                               (4, 'PUBLIC', 'En realidad se refiere al usuario que entra en el sitio sin haber iniciado sesión.');

INSERT INTO users_data VALUES ('BRADON', 'ALEXIS', 'SOLIS', 'BARRERA', 'alexis@gmail.com', '12345', 1),
                              ('JOSE', NULL, 'GUTIERREZ', 'LUJANO', 'jose@gmail.com', '54321', 2),
                              ('JOSE', 'MIGUEL', 'PANIAGUA', 'TINAJERO', 'jmpt@gmail.com', '007', 3),
						('JUAN', 'MANUEL', 'PEREZ', 'MALDONADO', 'juan@gmail.com', '008', 1);

INSERT INTO report_type VALUES (1, 'VENTAS', 'SEMANALMENTE', 'El número de ventas realizadas por semana se muestra aquí.'),
                               (2, 'VENTAS', 'MENSUALMENTE', 'En este informe encontramos las ventas de todo un mes.'),
                               (3, 'VENTAS', 'ANUALMENTE', 'El informe anual es útil para saber cómo va nuestro negocio cada año.');

INSERT INTO products_data VALUES ('A', 'MARTILLO', 'Martillo de hierro sólido, capaz de aguantar varios años. Calidad garantizada en cada martillazo.', 249.99, 1000, 1, 1),
                                 ('B', 'JUEGO DE BROCAS', 'Un juego de brocas de acero, varias medidas.', 399.51, 500, 1, 2),
                                 ('C', 'CORTADORA INDUSTRIAL', 'Cortadora de industrial para flete de acero.', 1599.10, 200, 1, 3),
                                 ('D', 'PINZA DE ELECTRICISTA', 'Hecha de acero de carbono y con un tamaño de 7 pulgadas.', 121.89, 300, 1, 1),
                                 ('E', 'CAJA DE HERRAMIENTAS TRUPER', 'Un kit completo de herramientas de la marca TRUPER, altamente confiable en su calidad.', 2459.24, 1000, 1, 2),
                                 ('AA', 'BLOCK', 'La mejor calidad de BLOCK que no encontrarás en otro lugar.', 15.00, 2000, 2, 1),
                                 ('BB', 'LADRILLO', 'La mejor opción para construcciones de cualquier tipo.', 20.00, 5000, 2, 2),
                                 ('CC', 'CEMENTO TOLTECA 50KG', 'La mejor marca de cemento directo hasta ti.', 450.99, 1000, 2, 3),
                                 ('DD', 'VARILLA DE CALIBRE 5 (5/8")', 'Varillas de acero muy resistentes.', 499.69, 2000, 2, 3),
                                 ('EE', 'GRAVA GRUESA (BULTO)', 'Grava libre de todo tipo de impurezas, ideal para cualquier construcción.', 99.99, 4000, 2, 1);





