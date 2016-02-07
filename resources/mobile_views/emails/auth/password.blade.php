<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
        <body>
            <h3>Cброс пароля</h3>

                <div>
                    Для того чтобы сбросить пароль, перейдите по ссылке и заполните форму восттановления пароля: {{ url('password/reset', [$token]) }}.<br><br>

                    Ссылка будет активна в течении {{ config('auth.reminder.expire', 60) }} минут.
                </div>
        </body>
</html>
