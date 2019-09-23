## Avaliação Técnica do CGSAG para vaga DAS 102.3 (Desenvolvedor PHP)

### Objetivo
Desenvolver uma aplicação simples, em PHP, onde pessoas serão cadastradas e conectadas por seus interesses em comum ou próximidade (localidade).

### Requisitos
A aplicação deve consistir no mínimo, das funcionalidades: cadastrar, listar e visualizar pessoa(s).

No cadastro, devem ser informados:

- Nome (obrigatório)
- Foto (obrigatório)
    - Arquivo no formato JPEG ou PNG
- E-mail (opcional):
    - Endereço de e-mail válido
    - Valor único em todo o sistema
- Data de nascimento (opcional)
- Data no formato DD/MM/YYYY
- Localidade (obrigatório)
    - Cidade ou município
- Interesses (opcional)
    - Um interesse por linha
    - Cada interesse deve:
        - conter no mínimo 3 caracteres; e
        - ser único em todo o sistema.

Na visualização, deve ser exibido:

- Foto
- Nome
- Localidade
- Lista de pessoas relacionadas
    - Se não houverem registros relacionados por interesse, devem ser considerados os registros de pessoas com a mesma localidade.

### Desenvolvimento
- A aplicação, de preferência, deve ser modelada com separação de camadas, usando algum padrão de mercado, como o MVC;
- Os dados devem ser armazenados em um banco de dados SQLite, ou seja, no mesmo local onde a aplicação será executada (que deve ser enviado juntamente com o material desenvolvido, ao final);
- Os dados devem ser validados, quando possível, tanto no front-end quanto no back-end;
- O uso de CSS não é um requisito, mas é importante que as telas sejam fáceis de visualizar e navegar;

### Critérios de avaliação
- Conceitos de Orientação a Objetos e outros conceitos relacionados;
- Conhecimento e compreensão de padrões de projetos (design patterns);
- Design e organização de código;
- Extensibilidadade e reúso de componentes;
