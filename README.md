
<img src="https://pbs.twimg.com/profile_images/1101482716472754176/u6zoSnlL_400x400.png" width="200">

<details>
  <summary>Instalação</summary>
    <p>
        altere o nome do arquivo .env.example para .env
    </p>
    <p>
        crie um banco de dados mysql com nome agility e altere as informações de conexao
    </p>
    <p>
        composer update
    </p>
    <p>
        php artisan key:generate
    </p>
    <p>
        php artisan migrate
    </p>
    <p>
        php artisan serve
    </p>
</details>

Após a instalação:

- Para usar o sistema crie um usuário
- O sistema estará desatualizado, clique no botão atualizar ele fará uma carga de dados dos endpoints fornecidos
- Para analisar os logs acesse Log do Sistema, logs do tipo Alert monitoram as sincronizações
- Caso o debug esteja ativo, todos os acessos estarão mapeados como log do tipo Notice
- Caso queira, é possivel deletar um ou dois registros para testar a sincronização
- Caso queira, é possível buscar um registro no campo buscar

Este projeto usa uma lib de sccafold chamada infyom e uma outra para visualizar os logs do laravel denominada logviewer.

Espero que gostem do resultado final :D 


