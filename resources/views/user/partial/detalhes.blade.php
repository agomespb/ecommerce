<div class="table-responsive cart_info">

    <table class="table table-condensed">

        <thead>
        <tr>
            <th>
                Nome Completo
            </th>
            <th>
                E-mail
            </th>

        </tr>
        </thead>
        <tbody>

            <tr>
                <td>
                    {{ Auth::user()->name }}
                </td>
                <td>
                    {{ Auth::user()->email }}
                </td>

            </tr>

        </tbody>

    </table>

</div>
