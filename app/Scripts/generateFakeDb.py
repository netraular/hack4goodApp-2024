import mysql.connector
import random
from dotenv import load_dotenv
import os

# Carga las variables de entorno desde el archivo .env
load_dotenv(dotenv_path='/var/www/html/hack4goodApp/.env')

# Configura la conexión a la base de datos
db_config = {
    'host': os.getenv('DB_HOST'),
    'user': os.getenv('DB_USERNAME'),
    'password': os.getenv('DB_PASSWORD'),
    'database': os.getenv('DB_DATABASE')
}


# Conecta a la base de datos
conn = mysql.connector.connect(**db_config)
cursor = conn.cursor()

# Datos para los productos
products = [
    ("Electronics", "Smartphone", "Apple", "smartphone.jpg", "Latest model with advanced features"),
    ("Clothing", "T-Shirt", "Nike", "tshirt.jpg", "Comfortable and stylish"),
    ("Food", "Chocolate", "Cadbury", "chocolate.jpg", "Delicious milk chocolate"),
    ("Books", "Novel", "Penguin", "novel.jpg", "Bestselling novel by a renowned author"),
    ("Toys", "Lego Set", "Lego", "lego.jpg", "Build your own adventure"),
    ("Electronics", "Laptop", "Dell", "laptop.jpg", "High performance laptop"),
    ("Clothing", "Jeans", "Levi's", "jeans.jpg", "Classic denim jeans"),
    ("Food", "Ice Cream", "Ben & Jerry's", "icecream.jpg", "Creamy and flavorful"),
    ("Books", "Biography", "Random House", "biography.jpg", "Insightful biography of a famous figure"),
    ("Toys", "Doll", "Barbie", "doll.jpg", "Classic fashion doll"),
    ("Electronics", "Tablet", "Samsung", "tablet.jpg", "Portable and powerful"),
    ("Clothing", "Sneakers", "Adidas", "sneakers.jpg", "Stylish and comfortable"),
    ("Food", "Candy", "Hershey's", "candy.jpg", "Sweet and tasty"),
    ("Books", "Science Fiction", "Tor Books", "scifi.jpg", "Exciting science fiction novel"),
    ("Toys", "Action Figure", "Hasbro", "actionfigure.jpg", "Detailed and poseable"),
    ("Electronics", "Smartwatch", "Fitbit", "smartwatch.jpg", "Track your fitness goals"),
    ("Clothing", "Dress", "Zara", "dress.jpg", "Elegant and fashionable"),
    ("Food", "Cookies", "Oreo", "cookies.jpg", "Crunchy and delicious"),
    ("Books", "Mystery", "HarperCollins", "mystery.jpg", "Intriguing mystery novel"),
    ("Toys", "Puzzle", "Ravensburger", "puzzle.jpg", "Challenging and fun"),
    ("Electronics", "Camera", "Canon", "camera.jpg", "Capture life's moments"),
    ("Clothing", "Jacket", "North Face", "jacket.jpg", "Warm and durable"),
    ("Food", "Soda", "Coca-Cola", "soda.jpg", "Refreshing and bubbly"),
    ("Books", "Fantasy", "Bloomsbury", "fantasy.jpg", "Magical fantasy world"),
    ("Toys", "Board Game", "Hasbro", "boardgame.jpg", "Fun for the whole family"),
    ("Electronics", "Headphones", "Bose", "headphones.jpg", "Immersive sound experience"),
    ("Clothing", "Shorts", "H&M", "shorts.jpg", "Cool and comfortable"),
    ("Food", "Chips", "Lay's", "chips.jpg", "Crispy and flavorful"),
    ("Books", "Romance", "Penguin", "romance.jpg", "Heartwarming love story"),
    ("Toys", "Remote Control Car", "Hot Wheels", "rccar.jpg", "Fast and fun"),
]

# Datos para los lugares en España con coordenadas
lugares = [
    ("Madrid", 40.4168, -3.7038),
    ("Barcelona", 41.3851, 2.1734),
    ("Valencia", 39.4667, -0.3750),
    ("Sevilla", 37.3891, -5.9845),
    ("Bilbao", 43.2630, -2.9350),
    ("Alicante", 38.3452, -0.4810),
    ("Málaga", 36.7202, -4.4200),
    ("Zaragoza", 41.6488, -0.8891),
    ("Murcia", 37.9870, -1.1300),
    ("Palma de Mallorca", 39.5696, 2.6502),
    ("Las Palmas de Gran Canaria", 28.1248, -15.4300),
    ("Santiago de Compostela", 42.8782, -8.5448),
    ("Granada", 37.1773, -3.5986),
    ("Oviedo", 43.3603, -5.8448),
    ("Pamplona", 42.8169, -1.6432),
    ("San Sebastián", 43.3183, -1.9812),
    ("Vitoria-Gasteiz", 42.8467, -2.6716),
    ("Toledo", 39.8628, -4.0273),
    ("Salamanca", 40.9651, -5.6619),
    ("Córdoba", 37.8882, -4.7794),
]

# Inserta los productos en la base de datos
for product in products:
    query = """
    INSERT INTO Product (category, name, marca, pic, description)
    VALUES (%s, %s, %s, %s, %s)
    """
    cursor.execute(query, product)
    product_id = cursor.lastrowid

    # Genera de 0 a 5 QRs para cada producto
    qr_count = random.randint(0, 5)
    for _ in range(qr_count):
        end = random.choice([0, 1])
        puntuacion = random.uniform(0, 100)
        distancia = random.uniform(0, 100)
        query = """
        INSERT INTO Qr (product_id, end, puntuacion, distancia)
        VALUES (%s, %s, %s, %s)
        """
        cursor.execute(query, (product_id, end, puntuacion, distancia))
        qr_id = cursor.lastrowid

        # Genera de 0 a 4 nodos para cada QR
        node_count = random.randint(0, 4)
        for _ in range(node_count):
            lugar, coord_x, coord_y = random.choice(lugares)
            query = """
            INSERT INTO Node (qr_id, lugar, coord_x, coord_y)
            VALUES (%s, %s, %s, %s)
            """
            cursor.execute(query, (qr_id, lugar, coord_x, coord_y))

# Confirma los cambios y cierra la conexión
conn.commit()
cursor.close()
conn.close()