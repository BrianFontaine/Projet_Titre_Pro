        // Mot de passe avec force & couleur
        $(function () {

            // Fait apparaitre la progressbar quand on focus le champ password
            $(`input[name="pass"]`).focus(function () {
                let forcePassword = document.getElementById('forcePassword');
                $(forcePassword).slideDown();
            })

            // selectionne un élément et affique la fonction au keyup
            $("input[name='pass']").keyup(function () {
                // prend la value du selecteur choisi précédement
                var password = $(this).val();
                var force = 0;
                // vérifie que la value de l'input contient des lettres
                // Si c'est le cas, la force prend +1
                if (password.match(/(?=.*[a-z])/) || password.match(/(?=.*[A-Z])/)) {
                    force++;
                }
                // vérifie que la value de l'input contient des chiffres
                if (password.match(/(?=.*[0-9])/)) {
                    force++;
                }
                // vérifie que la value de l'input contient des caractères spéciaux
                if (password.match(/(?=.*\W)/)) {
                    force++;
                }
                // vérifie que le password contient au moins 8 caractères
                if (password.length >= 8) {
                    force++;
                }

                var textForce = $("#force");
                // couleur en fonction de la force
                if (force == 1) {
                    var bgColor = '#FF0000';
                    textForce.text('Faible');
                } else {
                    if (force == 2) {
                        var bgColor = '#FF8000';
                        textForce.text('Moyen');
                    } else {
                        if (force == 3) {
                            var bgColor = '#D3CF00';
                            textForce.text('Fort');
                        } else {
                            if (force == 4) {
                                var bgColor = '#35CD00';
                                textForce.text('Très fort');
                            }
                        }
                    }
                }
                document.getElementById('progress').style.backgroundColor = bgColor;
                document.getElementById('progress').style.width = 25 * force + '%';
            })

            // fait disparaitre la progressbar quand on quitte le champ password
            $("input[name='password']").blur(function () {
                $("#forcePassword").slideUp();
            })
        });