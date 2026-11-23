# FaturamentoProfox

Sistema web de faturamento desenvolvido em **PHP**, com cadastro e gerenciamento de faturas, itens e geração de documentos para visualização, impressão e exportação em PDF.

> **Portfólio:** este repositório demonstra trabalho com aplicações empresariais, organização MVC, consultas a banco de dados e geração de documentos. Recursos descritos aqui foram identificados na documentação do projeto; consulte o código e execute em ambiente de teste antes de usar em produção.

## Funcionalidades documentadas

- Gerenciamento de faturas e itens com informações de clientes.
- Cálculo de subtotais e totais a partir de quantidade e valor unitário.
- Visualização de fatura em layout preparado para impressão A4.
- Impressão pelo navegador e exportação com `html2pdf.js`.
- Configurações de identidade da empresa, rodapé e dados bancários.
- Acesso à geração de documentos pela listagem, edição e rota dedicada.

## Tecnologias

| Camada | Tecnologias |
| --- | --- |
| Backend | PHP, PDO |
| Interface | HTML, CSS, JavaScript |
| Organização | Controllers, Models, Views |
| Documentos | Impressão do navegador, html2pdf.js |
| Dependências | Composer; verificar `composer.json` para versões e bibliotecas disponíveis |

## Estrutura principal

```text
app/
  Config/        # Configurações da aplicação
  Controllers/   # Fluxos de faturamento
  Models/        # Dados de faturas e itens
  Views/faturas/ # Telas e layout de impressão
public/          # Entrada web e arquivos estáticos
composer.json
```

## Conheça o projeto

O fluxo de geração de PDF é descrito em:

- [Guia de geração de PDF](GUIA_PDF.md)
- [Exemplos de PDF](EXEMPLO_PDF.md)
- [Controller de faturas](app/Controllers/FaturasController.php)
- [View de impressão](app/Views/faturas/pdf.php)

### Execução local

Este README ainda não define uma instalação reproduzível: confirme requisitos de PHP, banco de dados, variáveis de ambiente e migrations antes de executar. **Não use dados reais de clientes nem credenciais de produção em testes.**

## Próximas melhorias

- Documentar instalação do zero com banco de dados de exemplo.
- Adicionar capturas de tela sem dados sensíveis.
- Automatizar testes e validações no GitHub Actions.
- Publicar demonstração isolada com dados fictícios.

---

**Autor:** [Hernesto Filho](https://github.com/hernestodf)  
**Áreas:** Desenvolvimento PHP · Sistemas empresariais · SQL · Automação

[LinkedIn](https://www.linkedin.com/in/hernesto-filho/) · [GitHub](https://github.com/hernestodf)
