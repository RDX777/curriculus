import moment from "moment";

export function cpfFormater(cpf: string | undefined | null) {
  if (cpf) {
    cpf = cpf.padStart(11, "0");
    cpf = cpf.replace(/\D/g, "");
    cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    return cpf;
  }
}

export function cnpjFormater(cnpj: string | undefined | null) {
  if (cnpj) {
    cnpj = cnpj.replace(/\D/g, "");
    cnpj = cnpj.padStart(14, "0");
    cnpj = cnpj.replace(
      /^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/,
      "$1.$2.$3/$4-$5"
    );
    return cnpj;
  }
}

export function cepFormater(cep: string | undefined | null) {
  if (cep) {
    cep = cep.replace(/\D/g, "");
    cep = cep.padStart(8, "0");
    cep = cep.replace(/^(\d{5})(\d{3})$/, "$1-$2");
    return cep;
  }
}

export function phoneFormater(phone: string | undefined | null) {
  if (phone) {
    phone = phone.replace(/\D/g, "");
    if (phone.length === 11) {
      phone = phone.replace(/^(\d{2})(\d{5})(\d{4})$/, "($1) $2-$3");
    } else {
      phone = phone.replace(/^(\d{2})(\d{4})(\d{4})$/, "($1) $2-$3");
    }

    return phone;
  }
}

export function formatDate(dateString: string) {
  if (dateString) {
    const momentDate = moment(dateString);
    const formattedDate = momentDate.format("DD/MM/YYYY [às] HH:mm");
    return formattedDate;
  }
  return "";
}

export function subtractDate(days: number | string | undefined) {
  const today = moment();
  const newDate = today.subtract(days, "days");
  return newDate.format("YYYY-MM-DD");
}
