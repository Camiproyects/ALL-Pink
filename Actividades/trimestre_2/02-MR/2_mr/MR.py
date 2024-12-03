import pandas as pd

# Crear las tablas del modelo relacional en un DataFrame
data = {
    "Tabla": [
        "clientes",
        "productos",
        "categorias",
        "admin",
        "carro",
        "compra",
        "productos_compra",
        "pagos",
        "enstock"
    ],
    "Atributos": [
        "id (PK), username, password, name",
        "id (PK), descripcionProducto, price, imagen, name, id_categoria (FK), oferta",
        "id (PK), categoria",
        "id (PK), username, password, name",
        "id (PK), id_cliente (FK), id_producto (FK), cant, talla",
        "id (PK), id_cliente (FK), fecha, monto, estado",
        "id (PK), id_compra (FK), id_producto (FK), cantidad, monto",
        "id (PK), id_cliente (FK), id_compra (FK), comprobante, nombre, fecha, estado",
        "idstock (PK), id_producto (FK), cantidadStock, TallaS"
    ],
    "Relaciones": [
        "Relaciona con carro (FK), pagos (FK), compra (FK)",
        "Relaciona con enstock (FK), productos_compra (FK), categorias (FK)",
        "Relaciona con productos (FK)",
        "No tiene relaciones externas",
        "Relaciona con clientes (FK), productos (FK)",
        "Relaciona con clientes (FK), productos_compra (FK)",
        "Relaciona con compra (FK), productos (FK)",
        "Relaciona con clientes (FK), compra (FK)",
        "Relaciona con productos (FK)"
    ]
}

# Crear DataFrame
df = pd.DataFrame(data)

# Guardar como archivo Excel
output_path = "/mnt/data/modelo_relacional_base_datos.xlsx"
df.to_excel(output_path, index=False, sheet_name="Modelo Relacional")

output_path
