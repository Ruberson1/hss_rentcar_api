# README

## Sistema de Gerenciamento de Locação

Bem-vindo ao Sistema de Gerenciamento de Locação, uma aplicação Vue.js com backend Laravel, projetada para empresas de locação de veículos. Esta aplicação faz parte de um desafio técnico e serve como uma solução abrangente para gerenciar reservas de veículos, confirmações e funções de usuário.

### Frontend

#### Tecnologias Utilizadas
- **Vue.js:** Um framework JavaScript progressivo para construir interfaces de usuário.
- **Axios:** Um cliente HTTP baseado em promessas para fazer solicitações de API.
- **Pinia:** Uma biblioteca de gerenciamento de estado para aplicações Vue.js.
- **Bootstrap:** Um framework de front-end para construir aplicações web responsivas e modernas.

#### Sistema de Autenticação
A aplicação possui um sistema de autenticação completo com três tipos de funções de usuário: admin, comum e cliente. Cada função tem permissões e responsabilidades específicas dentro do sistema.

- **Admin:** Usuários administradores têm permissões adicionais além dos usuários comuns, incluindo a capacidade de listar e criar veículos e usuários.
- **Comum:** Usuários comuns têm a autoridade para confirmar reservas feitas por clientes.
- **Cliente:** Clientes podem iniciar reservas de veículos.

#### Fluxo de Reserva
1. **Reserva do Cliente:** Um cliente inicia uma reserva para um veículo.
2. **Confirmação por Usuário Comum/Admin:** Um usuário comum ou administrador confirma a reserva, desencadeando uma notificação por e-mail para o cliente com detalhes sobre a reserva e o veículo alugado.
3. **Notificação por E-mail:** Um e-mail é enviado ao cliente com informações relevantes sobre a reserva e o veículo.
4. **Desencadeamento de Evento:** Um evento é acionado para atualizar o status de confirmação para verdadeiro e enviar o e-mail de confirmação quando os funcionários confirmam a reserva.

#### Permissões Específicas do Admin
Os usuários administradores têm permissões adicionais, incluindo a capacidade de listar e criar veículos e usuários. Isso permite que os administradores gerenciem a frota de veículos e contas de usuário de forma eficiente.

### Backend (Laravel)

#### Tecnologias Utilizadas
- **Laravel:** Um framework PHP poderoso e elegante para construir aplicativos web.
- **Laravel Breeze:** Um pacote leve para autenticação e frontend do Laravel.
- **Docker:** Uma plataforma para desenvolver, enviar e executar aplicativos em contêineres.

#### Configuração do Ambiente
Para executar o sistema, certifique-se de configurar seu arquivo `.env`. Se preferir, o sistema está configurado para rodar com Docker na porta 8000.

### Como Rodar

#### Usando Docker
1. Certifique-se de ter o Docker instalado.
2. Navegue até o diretório do projeto no terminal.
3. Execute o comando: `docker-compose up -d`.
4. Acesse o sistema em [http://localhost:8000](http://localhost:8000).

#### Configuração Manual
1. Configure o arquivo `.env` com as informações do banco de dados e outras configurações necessárias.
2. Execute as migrações do banco de dados: `php artisan migrate`.
3. Inicie o servidor: `php artisan serve`.
4. Acesse o sistema em [http://localhost:8000](http://localhost:8000).

**Observação:** Certifique-se de ter as dependências do Laravel instaladas. Para mais informações, consulte a documentação oficial do Laravel.

Aproveite o Sistema de Gerenciamento de Locação!
