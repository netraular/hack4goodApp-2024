'''  '''

import mysql.connector
# from openpyxl import load_workbook
import pandas as pd
from geopy.distance import geodesic
# import gmplot
# import webbrowser

cnx = mysql.connector.connect(user='hack4good', password='hack2win!', host='127.0.0.1', database='hack4goodDB')

''' Almacenamos el excel en df y worksheet '''

# df = pd.read_excel('Dataset2.xlsx')
# workbook = load_workbook('Dataset2.xlsx')
# worksheet = workbook.active


''' Determinamos la distancia recorrida por cada producto dist_total '''

for i in range(0, len(df)):
    
    dist_total = 0
    n = df.shape[1]

    lat = [] # Latitudes de los nodos
    lang = [] # Longitudes de los nodos
    
    for j in range(6, 5 + df.iloc[i, 4]):
        
        ''' Añadimos la distancia entre dos nodos consecutivos a la distancia total dist_total '''
        
        old = df.iloc[i, j - 1].split(',')
        new = df.iloc[i, j].split(',')
        
        array_old = [float(value.strip()) for value in old]
        array_new = [float(value.strip()) for value in new]
        
        point1 = tuple(array_old)
        point2 = tuple(array_new)
        
        dist_total += geodesic(point1, point2).kilometers
        
        ''' Guardamos las latitudes y longitudes '''
        
        if j == 6:
            lat.append(array_old[0])
            lang.append(array_old[1])
        lat.append(array_new[0])
        lang.append(array_new[1])
    
    
    worksheet['A' + str(i + 2)] = dist_total # Guardamos la distancia total en el excel
    
    
    ''' Visualización del recorrido del producto en Google Maps '''
    
    gmapOne = gmplot.GoogleMapPlotter(40.41589402891376, -3.728947052298249, 6) # Centramos el ma
    gmapOne.scatter(lat, lang, size = 50, marker = False)
    gmapOne.plot(lat, lang, 'red', edge_width = 2.5)
    gmapOne.draw("map" + str(i) + ".html")
    webbrowser.open('file:///C:/Users/Alex/Documents/H4G/map' + str(i) + '.html')
        

''' Guardamos los cambios y recargamos el excel '''

workbook.save('Dataset2.xlsx')
workbook = load_workbook('Dataset2.xlsx')
worksheet = workbook.active

df = pd.read_excel('Dataset2.xlsx')


''' Determinamos el CO2 producido del producto '''

for i in range(0, len(df)):

    if df.iloc[i, 3] == 'A':
        worksheet['B' + str(i + 2)] = df.iloc[i, 0] * 602
    if df.iloc[i, 3] == 'B':
        worksheet['B' + str(i + 2)] = df.iloc[i, 0] * 8
    if df.iloc[i, 3] == 'C':
        worksheet['B' + str(i + 2)] = df.iloc[i, 0] * 62
    if df.iloc[i, 3] == 'T':
        worksheet['B' + str(i + 2)] = df.iloc[i, 0] * 22

workbook.save('Dataset2.xlsx')