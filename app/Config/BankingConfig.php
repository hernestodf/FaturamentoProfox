<?php
namespace App\Config;

class BankingConfig {
    // Dados da Empresa
    const COMPANY_NAME = 'Profoxnetworks Soluções LTDA';
    const COMPANY_CNPJ = '18.782.546/0001-07';
    const COMPANY_IE = '0765535800192';
    const COMPANY_ADDRESS = 'Quadra 01 Conjunto A lote 06 Sala B – Itapoã 01';
    const COMPANY_CEP = '71590-203';
    const COMPANY_CITY = 'Brasília';
    const COMPANY_STATE = 'DF';
    const COMPANY_PHONE = '(61) 3368-8699';
    const COMPANY_EMAIL = 'profoxnetworks@gmail.com';
    
    // Dados Bancários
    const BANK_NAME = 'BANCO DO BRASIL';
    const BANK_AGENCY = '2727-8';
    const BANK_ACCOUNT = '103.895-8';
    const BANK_ACCOUNT_TYPE = 'Conta Corrente';
    const BANK_DOCUMENT = '18.782.546/0001-07';
    
    // Logo
    const LOGO_PATH = 'public/assets/images/logo.png';
    
    // Rodapé
    const FOOTER_TEXT = 'Profox Networks';
    const FOOTER_SUBTITLE = 'Soluções em Tecnologia da Informação';
    
    // Observação Padrão
    const DEFAULT_NOTE = 'Lei nº 8.846, de 1994, art. 1º. A interessada em epígrafe, exercendo o que prevê a Lei nº 9.430, de 27 de dezembro de 1996, art. 48, e atendendo à Instrução Normativa RFB nº 1.396, de 16 de setembro de 2013, com alterações, arts. 2º e 3º, afirma que tem como atividade a locação de bens móveis e que, no município que a jurisdiciona, há legislação proibindo a emissão de nota fiscal de serviço no auferimento daquela receita, por não se tratar de prestação de serviço.';
    
    public static function getCompanyInfo() {
        return [
            'name' => self::COMPANY_NAME,
            'cnpj' => self::COMPANY_CNPJ,
            'ie' => self::COMPANY_IE,
            'address' => self::COMPANY_ADDRESS,
            'cep' => self::COMPANY_CEP,
            'city' => self::COMPANY_CITY,
            'state' => self::COMPANY_STATE,
            'phone' => self::COMPANY_PHONE,
            'email' => self::COMPANY_EMAIL,
        ];
    }
    
    public static function getBankingInfo() {
        return [
            'bank' => self::BANK_NAME,
            'agency' => self::BANK_AGENCY,
            'account' => self::BANK_ACCOUNT,
            'account_type' => self::BANK_ACCOUNT_TYPE,
            'document' => self::BANK_DOCUMENT,
        ];
    }
}
