@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                

                <div class="card-body">
                    
                    <div class="form-group text-justify">
                            <h4 class="display-6 font-weight-bold">Conferências</h4>
                            <p class="lead">&nbsp;&nbsp;&nbsp;&nbsp;O sistema de conferências permite que os usuários criem um repositório de eventos, 
                                onde poderão cadastrar os eventos que irão participar.</p>
                    </div>

                    <div class="form-group text-justify">
                            <h4 class="display-6 font-weight-bold">Por que usar o Conferências?</h4>
                            <p class="lead">&nbsp;&nbsp;&nbsp;&nbsp;Para que você membro do React ou qualquer outra pessoa que deseja participar de 
                                algum evento (ou apresentar algum artigo nele), possa manter um controle das datas e outras informações referentes ao evento.</p>
                    </div>

                    <div class="form-group text-justify">
                            <h4 class="display-6 font-weight-bold">O que é o Conferências?</h4>
                            <p class="lead">&nbsp;&nbsp;&nbsp;&nbsp;Devido a necessidade de manter um controle dos futuros eventos 
                                que os membros do React apresentarão seus artigos. Para, por exemplo, não perder os prazos de 
                                submissões dos artigos. O sistema de conferências permite que os usuários criem um repositório de 
                                eventos, onde poderão cadastrar os eventos que irão participar.</p>
                    </div>

                    <div class="form-group text-justify">
                            <h4 class="display-6 font-weight-bold">Como funciona?</h4>
                            <p class="lead">&nbsp;&nbsp;&nbsp;&nbsp;Funciona da seguinte maneira, mesmo que você não esteja cadastrado, 
                                    ou seja, sendo um guest. Poderá consultar os eventos cadastrados e pré-requisitos para participar deles. 
                                    Entretanto, não poderá alterar, excluir ou criar novos eventos. Para poder ter acesso a essas funcionalidades 
                                    o guest poderá fazer um pré-cadastro, onde será submetido a análise. Podendo ser aprovado ou não para 
                                    participar desse sistema. Quem faz essa validação é o administrador, que é outro membro desse sistema, 
                                    o principal na verdade. Ele que valida os usuários, os novos eventos cadastrados e etc. 
                            </p>
                            <p class="lead">
                                &nbsp;&nbsp;&nbsp;&nbsp; Fora o administrador tem também o moderador, que pode editar os eventos. 
                                Pode adicionar novos eventos, editar os já existentes, remover, enfim ele cuidará dos dados do eventos. 
                                Para isso ele terá uma view, por onde terá acesso a essas funcionalidades.
                            </p>
                            <p class="lead">
                                 &nbsp;&nbsp;&nbsp;&nbsp; Em relação aos eventos
                                 há dois pontos a serem destacados. Primeiro, os
                                 eventos quando forem cadastrados serão
                                 informados de que áreas ele está relacionado e
                                 quais tags ele possui. Segundo, todas as
                                 alterações feitas neles ficarão salvas. Ou
                                 seja, ficará registrado quem criou os eventos e
                                 quem os modificou. Ex.: Tem um evento chamado
                                 JCE. Na parte que mostra as informações deste
                                 evento, constará em um campo o nome de seu
                                 criador, em outro as atualizações que foram
                                 feitas, constando a data e quem o alterou.
                            </p>
                            <p class="lead">
                                 &nbsp;&nbsp;&nbsp;&nbsp; Resumindo, o
                                 administrador pode fazer tudo que o moderador
                                 faz. Entretanto, também pode fazer o CRUD de
                                 usuários, podendo aprovar novos, excluir ou
                                 editar os já existentes, criar novos usuários
                                 que já estarão ativos e etc. O administrador
                                 também pode fazer o CRUD de área e de tag. Ou
                                 seja, todas as vezes que for cadastrar um novo
                                 evento tem que definir a que área ele pertence,
                                 seja ciência e tecnologia, saúde, moda, entre
                                 outros. E terá as tags, que são basicamente
                                 palavras chaves para facilitar sua localização
                                 nas pesquisas.
                           </p>
                    </div>
                    
                </div>

                
            </div>
        </div>
    </div>
</div>

@endsection
