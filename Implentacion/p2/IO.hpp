
#ifndef BASE_IO_HPP
#define BASE_IO_HPP

#include<QString>

struct P;

class A
{
A();
};

class IO
{
public:
    IO(const QString &app = "");

    /**
     * \brief Elimina los archivos con las respuestas.
     *
     * @return Retorna verdadero si los archivos fueron eliminados. De lo contrario, retorna falso.
     *
     */
    bool cleanResponses();

    /**
     * \brief Crea el directorio donde se guardarán los ajustes.
     *
     * @return Retorna verdadero si el directorio fue creado satisfactoriamente (o si ya existía), de lo contrario, retorna falso.
     *
     */
    bool createDirSettings();

    /**
     * \brief Indica si es la primera vez que se ejecuta la aplicación.
     *
     * @return Retorna verdadero si es la primera vez que se ejecuta la aplicación. Esto es, si no se han guardado los ajustes de esta.
     */
    bool firstTime();

    /**
     * \brief Obtenemos el directorio de las imágenes.
     *
     * @param aPaths Direcciones a las carpetas donde están las imágenes. En este arreglo se guardarán las direcciones. El tamaño de este arreglo debe ser de 3.
     */
    void imagePath(QString * aPaths);

    /**
     * \brief Obtenemos la lista de las imágenes.
     *
     * @return Lista de imágenes.
     *
     */
    QStringList images() const;

    /**
     * \brief Verifica q la contraseña sea correcta.
     *
     * @param sPassword Contraseña a verificar.
     *
     * @return Verdadero si la contraseña es correcta, de lo contrario retorna falso.
     *
     */
    bool isPassword(const QString &sPassword);

    /**
     * \brief Guarda la dirección del directorio donde están las imágenes.
     *
     * @param sImagePath Dirección del directorio donde están las imágenes.
     * @param iQuestion Número directorio a guardar.
     *
     */
    bool saveImagePath(const QString &sImagePath, int iQuestion);

    /**
     * \brief Guarda la contraseña.
     *
     * @param sPassword Contraseña a guardar.
     *
     */
    bool savePassword(const QString &sPassword);

    /**
     * \brief Guardamos la respuesta a la primera pregunta.
     *
     * @param sResponse Respuestas. Esta respuesta corresponde a una linea en formato cvs.
     *
     * @return Retonra verdadero si la respuesta se guarda correctamente, de lo contrario, retorna falso.
     *
     */
    bool saveResponse1(QString sResponse);

    /**
     * \brief Guardamos la respuesta a la segunda pregunta.
     *
     * @param sResponse Respuestas. Esta respuesta corresponde a una linea en formato cvs.
     *
     * @return Retonra verdadero si la respuesta se guarda correctamente, de lo contrario, retorna falso.
     *
     */
    bool saveResponse2(QString sResponse);

    /**
     * \brief Guardamos el resultado de las preguntas en un archivo distinto al definido por el sistema.
     *
     * @param sPath Dirección donde se guardará el archivo.
     *
     */
    bool saveLike(QString sPath);

    /**
     * \brief Indica si existe el directorio de ajustes.
     *
     * @return Retorna verdadero si el directorio donde se guardarán los ajustes existe. De lo contrario retorna falso.
     */
    bool settingsExist();

    QString settingsDir() const;

protected:

    QString _sSettingsDir;

    QString _sAppPath;

    void initSettings();
};

inline QString IO::settingsDir() const
{
    return _sSettingsDir;
}

int funcion();

#endif

