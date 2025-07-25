# Sistema de Gestión de Compras

Aplicación web desarrollada en HTML, PHP y MySQL para la gestión de compras, productos, proveedores y clientes de una empresa que opera en las ciudades de Río Grande, Tolhuin y Ushuaia.

## Descripción

Este sistema permite a los administradores de la empresa registrar y gestionar:

- Clientes y sus datos personales
- Proveedores y la calidad de sus productos
- Productos agrupados por categoría
- Compras realizadas por clientes, junto a sus detalles
- Operaciones CRUD (ABMC) completas
- Informes y listados dinámicos

También se aplican lógicas específicas como:
- Recargo del 5% por pagos con tarjeta
- Descuento del 10% por pagos en efectivo
- Actualización automática de stock y total de compra

## Funcionalidades principales

1. ABMC de Clientes, Proveedores, Productos, Compras y Detalles de compra.
2. Registro y validación de usuario con doble contraseña.
3. Listado de compras en un rango de fechas.
4. Filtro de productos por categoría.
5. Listado de compras por cliente.
6. Listado de productos según calidad del proveedor y categoría.
7. Validaciones en tiempo real (stock, precios, cantidades).
8. Eliminación condicionada según integridad referencial (no se puede eliminar si hay asociaciones activas).
9. Cálculo automático del total según forma de pago.
10. Actualización de stock en compras y devoluciones.

## Tecnologías utilizadas

- PHP
- MySQL
- HTML / CSS
- XAMPP (Apache + MySQL)

## Instalación

1. Clonar o descargar este repositorio.
2. Colocar la carpeta del proyecto dentro de `htdocs/` de XAMPP.
3. Importar el archivo `base_de_datos.sql` desde phpMyAdmin.
4. Iniciar los servicios de Apache y MySQL desde XAMPP.
5. Acceder al sistema desde el navegador:
