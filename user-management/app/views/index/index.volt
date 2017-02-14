<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
    </head>
    <body style="width:99% ;height:99%">
        <h2 style="padding-left: 5%">Affichage des users</h2>

        <div class="ui menu">
            <a class="item" href="{{ url("user/form") }}">
                <i class="add user icon">
                </i>
                Nouvel <utilisateur></utilisateur> ...
            </a>
        </div>

        <table id="example" class="ui celled table" cellspacing="0" width="100%">
            <thead style="background-color: lightblue">
            <tr>
                <td>Prénom</td>
                <td>Nom</td>
                <td>Login</td>
                <td>Email</td>
                <td>Rôle</td>
                <td>Actions</td>

            </tr>

            </thead>
            {% for user in users %}
            <tbody>
            <tr>
                <td>
                    {{  user.getFirstname() }}
                </td>
                <td>
                    {{  user.getLastname() }}
                </td>
                <td>
                    {{  user.getLogin() }}
                </td>
                <td>
                    {{  user.getEmail() }}
                </td>
                <td>
                    {{  user.getRole().getName() }}
                </td>
                <td>

                    {{linkTo("user/update/"~user.getId(), "<i class='bordered edit icon'></i>")}}
                    {{linkTo("user/message/delete/"~user.getId(), "<i class='bordered red remove icon'></i>")}}

                </td>
            </tr>
            </tbody>
            {% endfor %}
            <tfoot>
            <tr>
                <th colspan="8">
                    <div class="ui right floated pagination menu">
                        {{ link_to("index/index/bef", "<", "class": "icon item") }}
                        {{ link_to("index/index/1", "1", "class": "item") }}
                        {{ link_to("index/index/2", "2", "class": "item") }}
                        {{ link_to("index/index/3", "3", "class": "item") }}
                        {{ link_to("index/index/4", "4", "class": "item") }}
                        {{ link_to("index/index/aft", ">", "class": "icon item") }}
                    </div>
                </th>
            </tr>
            </tfoot>
        </table>
    </body>
</html>

