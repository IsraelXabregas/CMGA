# CENTRAL DE MONITORAMENTO E GERENCIAMENTO DE ACESSOS POR RFID

Projeto de TCC utilizado como requisito para formação em Técnico em Automação Industrial na Escola Técnica Estadual Presidente Vargas (ETEC Centro Paula Souza).
O projeto teve como finalidade constituir um sistema de gerenciamento de acessos em ambiente escolar.

O projeto funciona através da integração entre hardware e software. Inicialmente, é instalada em cada porta de salas e laboratórios uma trava com um leitor RFID. A aplicação web no computador serve em primeiro momento, para cadastrar os cartões de acesso com os dados de cada professor ou funcionário. Após os dados serem devidamente cadastrados em sistema, o professor ou funcionário estará apto para acessar um laboratório com seu crachá, no caso, seu cartão de acesso com a tecnlogia RFID.

Quando o cartão de acesso for apresentado no leitor da porta, a numeração única do cartão de acesso, chamada de UID (Unique Identifier) será lida e recebida pelo controlador arduino através do RFID. Mediante os dados recebidos, a aplicação desenvolvida irá verificar se o UID está cadastrado em sistema e se o mesmo está liberado para acesso. Caso esteja devidamente cadastrado e liberado, a aplicação enviará um comando para o controlador liberar o laboratório ou sala para uso. Este processo ocorre instantaneamente e pode ser acompanhado na aplicação para monitoramento, além de ser possível fazer aberturas remotas dos laboratórios disponíveis.

## Diagrama com recursos e tecnologias utilizados no projeto:
![
](https://lh3.googleusercontent.com/dMeRzaZfaH6sRbdUIroFqsYKUBSS_1vhAJjifeeIz_AQwv8VVxAQSGwdJefAmlCLi8DASwNTduI3=s880)

## Principais linguagens e ferramentas de programação:
> PHP (framework CodeIgniter)

>  JavaScript (biblioteca jQuery)

>  MySQL

>  C++

>  NodeJS (módulos: Socket.IO, SerialPort, NodeMySQL)

>  JSON

>  ZigBee

>  RFID

## Exemplo de uso do NodeJS no projeto
![
](https://lh3.googleusercontent.com/P4TkET6KoW0Al7c3dWYoo1zf_N6ammTUm-VAJ8WROf7qIZ9iS4NC357Z1P6LorS9ZDc2Ha-0k_9Y=s880 "Uso NodeJS")
![
](https://lh3.googleusercontent.com/Q8CkYsMI4lXXx_H3CAkhP4hWAkyI2yJer8gI0qIPon7rF8wXS-Ls_DUmqiY4JOm9S5OGuPOXVkOT=s800 "Uso NodeJS")

## Principais telas do projeto
![
](https://lh3.googleusercontent.com/q-OVp9USmYB4StFKAeo0HSEFhWINyRBwOUtqy1WBLxh3bFQ39q3OaidBkCrYAMrr4RiQTVhvS05x=s880 "Tela de login")
![
](https://lh3.googleusercontent.com/ZIhQUQnu0WU8qxuQe8a9BWPkEU9_yNK0xkPemLzcrSqQ-AY4dmrGXylxnrUJlcjvTDst0KBF9ESn=s880 "Homepage")
![
](https://lh3.googleusercontent.com/HVUrP_X5_1FPWozS6i39awauy8-kyf7fcukv00rB-gw9WgitoFzgBCNWX_PtJWKNoHU-M2Xlv9P8=s880 "Gerenciamento de usuários")
![
](https://lh3.googleusercontent.com/qWLx04zmjmZIBEWOUSMFQflnBIe0iFhLF7UDYPFqfEcgvbUgsU6HvZhjHOr34m2Tlp1O2u93AjX7=s880 "Formulário novo usuário com validações")
![
](https://lh3.googleusercontent.com/kUBRzvPJZzY4cUFXBHbCRFEdjKKM8jhpGqviMTNdGMzJJvJDiEZPLizevWUWmpObbGkXuYviqhbS=s880 "Formulário editar usuário com validações")
![
](https://lh3.googleusercontent.com/bdd4f38O_Oj7Hvm8H6Jq0u15lzzQ-A4NU1NcfY1ehCQk4fACARJLnVB-QCWj7pJbUfIodxYpjP9A=s880 "Modal confirmação de exclusão")
![
](https://lh3.googleusercontent.com/wudTUUn7evOSKhIY8vgp2C2dNof6Qro9PL6Fci8VaJovh_vONq7BkqFYImdtr6dA8A-f9b3Bu0Qr=s880 "Monitoramento em tempo real")
![
](https://lh3.googleusercontent.com/PiUnVNIbYqG7UetTF5FXcKMlSs4jgJRDtOZHANPJelrOAqHLwm7oDO7aNsfjBwAIKoleYh-Ff6fl=s880 "Abertura remota")
![
](https://lh3.googleusercontent.com/zXp-WMv-nqhfC4NfVUuEI-AT0v6uCDZ3RJDJR_BW3hsSgwZj0BTNM4Kxf7qVjXXmpfmXv56P0wB5=s880 "Registros de ações")
![
](https://lh3.googleusercontent.com/nnrGu9gwb7sYqzgDS8ei2j7ykL0idSMPW_SVJtsU_Zuwdoz-jbxt3793CbJL4A9GeR3YTA-GCVwp=s880 "Gerenciamento de cartões de acesso")
