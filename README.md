# API Cadastro de Clientes


API de clientes, é um projeto para criar um cliente, com os dados de:  razão social, CNPJ e e-mail.


## 🔥 Introdução

API foi criada com os métodos Http, com todos os endpoints do Http: Get, Post, Put, Delete.
Para realizar todas as operações, será necessário registrar e autenticar o um novo usuário.

### ⚙️ Pré-requisitos
* PHP [PHP Download](https://www.php.net/downloads)
* Laravel versão 9 [Laravel V9 Download](https://laravel.com/docs/9.x/installation)
* My SQL [MySQL Download](https://www.mysql.com/downloads/)
* Xampp caso queria baixar o PHP e My SQL [Xampp Download](https://www.apachefriends.org/pt_br/download.html)
* Visual studio code [VS code download](https://code.visualstudio.com/download)
* Postman [Postman Download](https://www.postman.com/downloads/)



## Autenticação ✒️
Foi utilizado o [Sanctum](https://laravel.com/docs/9.x/sanctum), para realizar autenticação e geração de token de acesso aos endpoints

Para realizar a autenticação, será necessário acessar o endpoint POST "http://127.0.0.1:8000/api/register", para registrar um novo usuário
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/d0372ff0-c1fc-474c-bebf-ab551cfd5a98)

Na aba body, escolha a opção raw e JSON, e insira os campos obrigatórios para se cadastrar
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/24956ded-7ad6-4902-a25c-77988dc25393)

Todos os campos são obrigatórios, caso algum campo não seja inserido, a api irá retornar um erro

Campo confirmação de senha faltando
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/d936ed95-968e-48d8-9783-c3e0bec699d5)

O e-mail, é um campo único no banco de dados. Não podendo ser repetido
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/9e6600f9-c818-45b0-a453-8a7f3ca9d4cc)


A API irá mostrar os dados do usuário, ao ser realizada a requisição com os valores corretos
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/3d3197da-0d53-4123-9538-d98986cdc2b5)


### Login 💻
Para realizar o login para obter o token de acesso, o endpoint "http://127.0.0.1:8000/api/login", inserindo o dados de email e senha
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/5d9d1c71-9ad0-4db0-957f-1e616b3eaf7f)


### Token de Acesso 🎲
O Token de acesso, estará disponível após a realização do login, na retorno de resposta da api
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/daf23261-2138-406a-902c-0d2b102511e2)


### Acessando a API ⚙️
Após obter o token, será necessário copia-lo para a autorização.
Na parte superior do Postman logo abaixo das requisições, há uma aba de Authorization. Clicando irá ter uma seleção de Auth Type.
Escolha a opção Bearer Token, e cole o token no campo token logo ao lado
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/1034129c-0dbb-4c74-9c00-bf260456e1ba)


###  Acesso a API ⚙️
Após a realização da autenticação, os endpoints já estarão autorizados para acesso.

Caso o token não seja passado, ou esteja expirado. O acesso a API não será permitido
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/d0599fbd-ac06-4b16-91d7-36acb7ab3542)


### Logout 💻
O acesso para logout é: http://127.0.0.1:8000/api/logout
O logout será realizado com sucesso

![image](https://github.com/marcostwelve/clientes-api/assets/94411600/357587f8-1c3e-4f69-9d12-b80a28add1d6)



# Endpoins 🚨

## Endpoints do Cliente 👷
### Método Get ⬅️

O Método Get, realiza a busca todos os clientes
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/dbb304ef-40bb-4672-bfac-697cc49c893e)

### Método Get/{id} ⬅️

Após a execução, a api  irá retornar o dados solicitado. Status Code 200 Success
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/1de6bc29-173a-40e3-883e-483fc3ce34a3)



Caso o ID não exista, o endpoint irá retornar o Status Code 404 Bad Request (Cliente não encontrado)
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/a2f9770e-8c63-4b87-b910-c06c7cb06da2)


### Método get/cliente/razao-social/{razaoSocial} ⬅️
O método get/cliente/razao-social/{razaoSocial}, irá retornar todos os clientes a partir da razão social cadastrada.
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/2c9337c5-b719-488e-8eb4-672b7ae87761)



### Método Post ➡️
O método Post, realiza a criação de um novo cliente, enviando dados através do corpo da requisição
Todos os campos são obrigatórios.
Após a execução, a api irá retornar os dados criados. Status Code 201 Created
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/15352804-9e57-4878-aa48-b43bf5520d78)

Os campos contém validações no cadastro
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/ad13d964-f70d-4a33-997a-5f0a242a1b80)

Caso as informações não esteja de acordo com o esperado
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/56a290d1-b161-4e2c-bf67-1e12758e19d0)


Não é possível cadastrar um cliente com um e-mail ou CNPJ que já esteja na base de dados
Exemplo de utilização de e-mail já cadastrado;
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/e7a4feaf-aeba-4b28-8580-6679ba60736d)



### Método Put/id ↗️
O método Put, irá atualizar o cliente, enviado dados através do corpo da requisição, e informando o id do cliente a ser atualizado.
Necessário preenchimento de todos os campos para atualização
Após a execução, a api irá retornar os dados atualizados. Status code 200 Success
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/a8f2ff23-df37-4100-bdff-f0765019091c)

Se algum dados forem passado fora das regras, o retorno será um erro de código 500
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/78c67046-8c68-41c3-9f8b-c7cb6facc96e)


Caso o id não exista na base de dados, o retorno será o código 404
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/c30f25f5-ed2c-4dea-922b-a9cd89a78889)




### Método Delete/id ❌
O método Delete, irá deletar um cliente do banco de dados através do id do cliente a ser deletado. Sendo uma operação irreversível.
O retorno será o código 204, no content
![image](https://github.com/marcostwelve/clientes-api/assets/94411600/2265f732-3710-4cf2-a285-b40d8e73c61f)







## 📦 Tecnologias usadas:

* [PHP](https://www.php.net/)
* [Laravel](https://laravel.com/)
* [MySQL](https://www.mysql.com/)
* [Postman](https://www.postman.com/)


## 👷 Autores

* **Maurício Marcelino** - *Back-End do projeto* - [Maurício Marcelino](https://github.com/marcostwelve)


## 📄 Licença

Esse projeto está sob a licença (MIT) - acesse os detalhes [LICENSE.md](https://opensource.org/license/mit/).
