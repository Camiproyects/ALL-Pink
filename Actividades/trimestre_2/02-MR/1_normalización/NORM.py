import pandas as pd

# Crear las tablas con sus respectivas columnas y datos iniciales para la normalización
data = {
    "Tabla": [
        "clientes",
        "admin",
        "productos",
        "categorias",
        "carro",
        "enstock",
        "pagos",
        "compra",
        "productos_compra",
    ],
    "Columnas": [
        "id, username, password, name",
        "id, username, password, name",
        "id, descripcionProducto, price, imagen, name, id_categoria, oferta",
        "id, categoria",
        "id, id_cliente, id_producto, cant, talla",
        "idstock, id_producto, cantidadStock, TallaS",
        "id, id_cliente, id_compra, comprobante, nombre, fecha, estado",
        "id, id_cliente, fecha, monto, estado",
        "id, id_compra, id_producto, cantidad, monto",
    ],
    "Primera Forma Normal (1FN)": [
        "Eliminar duplicados en columnas como 'username', 'password' y repetir valores en 'clientes'.",
        "Identificar valores atómicos en columnas como 'name'.",
        "Dividir información de 'descripcionProducto' en unidades atómicas si es necesario.",
        "Mantener categorías únicas.",
        "Separar 'talla' y 'cant' en datos atómicos si es necesario.",
        "Evitar repeticiones en columnas de stock.",
        "Verificar que no haya redundancia en 'comprobante'.",
        "Separar 'fecha' y 'estado' si son no atómicos.",
        "Asegurar valores únicos por combinación de claves foráneas.",
    ],
    "Segunda Forma Normal (2FN)": [
        "Crear claves primarias para evitar redundancia en 'clientes'.",
        "Asegurar que 'username' dependa de la clave primaria en 'admin'.",
        "Relacionar 'id_categoria' a una tabla categórica si no existe.",
        "Evitar dependencia parcial entre 'id' y 'categoria'.",
        "Definir claves compuestas para identificar filas únicas en 'carro'.",
        "Asegurar dependencias completas de clave primaria en 'enstock'.",
        "Garantizar relación directa entre 'id_cliente' y datos en 'pagos'.",
        "Asegurar que 'id_cliente' sea clave primaria en 'compra'.",
        "Evitar dependencias parciales entre claves compuestas en 'productos_compra'.",
    ],
    "Tercera Forma Normal (3FN)": [
        "Eliminar dependencias transitivas en 'clientes'.",
        "Relacionar 'name' directamente con clave primaria en 'admin'.",
        "Separar dependencias transitivas entre 'id' y 'descripcionProducto'.",
        "Asegurar que 'categoria' solo dependa de su clave primaria.",
        "Eliminar dependencias transitivas en 'carro'.",
        "Relacionar 'cantidadStock' solo con clave primaria en 'enstock'.",
        "Evitar transitividad entre 'id_cliente', 'estado' y 'comprobante'.",
        "Separar dependencias transitivas en 'compra'.",
        "Evitar dependencias transitivas en 'productos_compra'.",
    ],
}

# Crear un DataFrame
df = pd.DataFrame(data)

# Exportar a Excel
ruta_excel = "/mnt/data/normalizacion_base_datos.xlsx"
df.to_excel(ruta_excel, index=False, sheet_name="Normalización")

ruta_excel
