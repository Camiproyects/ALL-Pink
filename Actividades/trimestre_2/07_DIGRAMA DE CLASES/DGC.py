from graphviz import Digraph

# Crear un diagrama de clases usando Graphviz
diagram = Digraph('Diagrama de Clases - Tienda Online', format='png', engine='dot')
diagram.attr(rankdir='LR', size='12,8')

# Estilo general
diagram.attr('node', shape='record', fontname='Helvetica', fontsize='10', style='filled', fillcolor='#F9F9F9')

# Definir las clases
classes = {
    "Admin": '''{
        Admin |
        - id : int |
        - username : varchar(50) |
        - password : varchar(50) |
        - name : varchar(50)
    }''',
    "Clientes": '''{
        Clientes |
        - id : int |
        - username : varchar(255) |
        - password : varchar(255) |
        - name : varchar(255)
    }''',
    "Carro": '''{
        Carro |
        - id : int |
        - id_cliente : int |
        - id_producto : int |
        - cant : int |
        - talla : varchar(50)
    }''',
    "Productos": '''{
        Productos |
        - id : int |
        - descripcionProducto : text |
        - price : double |
        - imagen : varchar(255) |
        - name : varchar(255) |
        - id_categoria : int |
        - oferta : int
    }''',
    "EnStock": '''{
        EnStock |
        - idstock : int |
        - id_producto : int |
        - cantidadStock : int |
        - tallaS : varchar(50)
    }''',
    "Categorias": '''{
        Categorias |
        - id : int |
        - categoria : varchar(255)
    }''',
    "Compra": '''{
        Compra |
        - id : int |
        - id_cliente : int |
        - fecha : datetime |
        - monto : float |
        - estado : int
    }''',
    "Productos_Compra": '''{
        Productos_Compra |
        - id : int |
        - id_compra : int |
        - id_producto : int |
        - cantidad : int |
        - monto : float
    }''',
    "Pagos": '''{
        Pagos |
        - id : int |
        - id_cliente : int |
        - id_compra : int |
        - comprobante : varchar(255) |
        - nombre : varchar(255) |
        - fecha : datetime |
        - estado : int
    }'''
}

# Agregar nodos
for class_name, class_definition in classes.items():
    diagram.node(class_name, class_definition)

# Definir las relaciones
relationships = [
    ("Clientes", "Carro", "1..*", "1"),
    ("Clientes", "Compra", "1", "1..*"),
    ("Compra", "Productos_Compra", "1", "1..*"),
    ("Productos", "Productos_Compra", "1", "1..*"),
    ("Productos", "EnStock", "1", "1"),
    ("Categorias", "Productos", "1", "1..*"),
    ("Clientes", "Pagos", "1", "1..*"),
    ("Compra", "Pagos", "1", "1")
]

# Agregar relaciones
for source, target, source_label, target_label in relationships:
    diagram.edge(source, target, label=f"{source_label} : {target_label}")

# Renderizar el diagrama
output_path = "/mnt/data/diagrama_clases_tiendaonline"
diagram.render(output_path, format="png", cleanup=True)
output_path + ".png"
