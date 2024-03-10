<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'almetteatr' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'H.8aVc@k5cvrXo)l}LVYt|<MHj!{XG!8;>=}!l@g r@ZH+Ms_Mbs+uqjeVnX(igg' );
define( 'SECURE_AUTH_KEY',  'Sw&+U2>M]{/A#+6V{d*wb|IAc)Z9w@E|Tp@PNsuhpRFcIJ8w~C1;]vs?7{wx,970' );
define( 'LOGGED_IN_KEY',    '&p)%@Wo&4|k^j%18lhK6@!Ce0b*F:l{rkxxF~K{y_o7t2:;{OzHe)MVau,ClUe>>' );
define( 'NONCE_KEY',        '@8_79uzBH?9^<PjMhLL$dX{5DtU>#/=84?BFyih(utEMOp&aLEIbo9zCyZ1J,5p[' );
define( 'AUTH_SALT',        '<zgFoXv3#ZT4 6s4`_dYf]y*I(DVDzo-GT1q>;/&[;%)*&2 $),#Y.K>tW?Fb bp' );
define( 'SECURE_AUTH_SALT', 'r(j9goKF2}X(5asL)ONL-?tY/4gv!TfV-t1l>+t4O=}+1Hdb87A/77>zD%R$EaS[' );
define( 'LOGGED_IN_SALT',   're+#ls{/~y&m`[E$8c%le@wj|Nfe7elO3.0*8yYJ_>[8xBgxq]!wq&>jv0$z+`zx' );
define( 'NONCE_SALT',       '[N`)>5=#:;C|.W3gdfvyK##`vH$XmN=E[ciSzc5>q+nVmXG.8U[Wsg!aaY8`J?Vy' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
