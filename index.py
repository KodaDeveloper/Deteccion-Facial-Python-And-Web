#Importação das bibliotecas
import pymysql
import cv2
import os

#Conexão com o banco
connection = pymysql.connect(
    host='localhost',
    user='root',
    password='',
    db='opencv',
)

try:
    with connection.cursor() as cursor:
        #Iniciando conexão com a table reconhecimento
        sql = "SELECT * FROM reconhecimento ORDER BY id DESC"
        try:
            cursor.execute(sql)
            result = cursor.fetchall()
            for row in result:
                #Definir classificador
                classificador = cv2.CascadeClassifier('cascades/haarcascade_frontalface_default.xml')
                classificadorOlhos = cv2.CascadeClassifier('cascades/haarcascade_eye.xml')

                #Tratar Imagens
                imagem = cv2.imread('Web/img/'+row[4])
                imagemCinza = cv2.cvtColor(imagem, cv2.COLOR_BGR2GRAY)

                #Identificar Face
                facesDetectadas = classificador.detectMultiScale(imagemCinza, scaleFactor=1.1, minNeighbors=20, minSize=(30,30))
                #Exibir informações
                print("----------------- \n")
                print("Quantidade de faces detectadas: " + str(len(facesDetectadas)))
                print("\n")
                print("Matriz de localização: " + str(facesDetectadas))
                print("\n")
                print("ID: " + str(row[0]))
                print("Nome: " + str(row[1]))
                print("Sobrenome: " + str(row[2]))
                print("Nome do Arquivo: " + str(row[4]))
                print("Tamanho: " + str(row[5]) + "Kbps")
                print("Tipo: " + str(row[6]))
                print("Imagem Reconhecida: " + str(row[7]) + "(True)")

                #Detecção
                for (x,y,l,a) in facesDetectadas:
                    img = cv2.rectangle(imagem, (x,y), (x+l,y+a), (255, 0, 255),2)


                    #Excluir imagem não detectada
                verifyimage = len(facesDetectadas)

                while verifyimage == 0:
                    os.remove('Web/img/'+row[4])
                    print("----------------- \n")
                    print("Nenhuma face detectada... \n")
                    print("Imagem removida com sucesso... \n")
                    print("----------------- \n")
                    id = str(row[0])
                    sql = "DELETE from reconhecimento WHERE id = " + id
                    cursor.execute(sql)

                    break

                #Exibe a imagem detectada
                cv2.imshow("Koda Developer",img)
                cv2.waitKey()

                #Lista com as Matrizes de localização
                lista = []
                #Adicona a Matriz de localização na lista
                lista.append(facesDetectadas)
                id = str(row[0])
                #Comparação de listas
                if lista == lista:
                    #Quantidade de faces detectadas
                    qt=len(facesDetectadas)
                    #Adicionando na DB status = IMAGEM RECONHECIDA E QUANTIDADE DE ROSTOS
                    sql = "UPDATE reconhecimento SET status = 'IMGRC' WHERE ID = "+ id
                    sql = "UPDATE reconhecimento SET qt_rosto = " + str(len(facesDetectadas)) + " WHERE ID = "+ id
                    cursor.execute(sql)

        except:
            print("Algo deu Errado")

    connection.commit()
finally:
    connection.close()
