
    <script>
        $(document).ready(function(){
            var digital = "<?= $digital; ?>"; 
            var idAluno = "<?= $alunoRetorno[0]['id']; ?>"; 
            console.log('>> aluno retorno', idAluno); 
            var verificarBiometria = false;
            comparar(digital,idAluno);
        });

        function comparar(digital,idAluno) {
            $.ajax({
                url: 'http://localhost:9000/api/public/v1/captura/Comparar?Digital=' + digital,
                type: 'GET',
                success: function(data) {
                    console.log('>> sucesso',data);
                    if(data == 'OK'){
                        window.location.href = "<?= constant("URL_LOCAL_SITE")?>/controller/acessoLiberado.php?id=" + idAluno;
                    }else{alert('Biometria incorreta. Tente novamente.');
                    window.location.href = "<?= constant("URL_LOCAL_SITE") ?>/?pagina=acesso&erro=Biometria%20incorreta";
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('>> erro', textStatus, errorThrown);
                alert('Aplicação da verificação da biometria não iniciado. Tente novamente.');
                window.location.href = "<?= constant("URL_LOCAL_SITE") ?>/?pagina=acesso&erro=Biometria%20incorreta";
            }
                }
            })
        }

       
    </script>
