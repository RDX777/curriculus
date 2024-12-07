"use client";
import { UniversalFunctionContext } from "./universalFunctionContext";

export const UniversalFunctionProvider = ({
  children,
}: {
  children: React.ReactNode;
}) => {
  function dateToPtBr(
    dateString: string | null | undefined
  ): string | undefined {
    if (dateString) {
      const [year, month, day] = dateString.split("-").map(Number);
      const date = new Date(year, month - 1, day);
      return date.toLocaleDateString("pt-BR", {
        day: "2-digit",
        month: "2-digit",
        year: "numeric",
      });
    }
  }

  function datetimeToPtBr(datetime: string | null | undefined) {
    if (datetime) {
      const data = new Date(datetime);

      // Formatação para DD/MM/YYYY HH:MM
      const dia = String(data.getDate()).padStart(2, "0");
      const mes = String(data.getMonth() + 1).padStart(2, "0"); // Os meses começam do 0
      const ano = data.getFullYear();
      const horas = String(data.getHours()).padStart(2, "0");
      const minutos = String(data.getMinutes()).padStart(2, "0");

      return `${dia}/${mes}/${ano} às ${horas}:${minutos}`;
    }
  }

  function dateToIso(dateToConvert: Date | string): string | null {
    return new Date(dateToConvert).toISOString().split("T")[0];
  }

  function paramsForNavigation(params: object): string {
    const stringParams = Object.fromEntries(
      Object.entries(params).map(([key, value]) => [key, String(value)])
    );
    return new URLSearchParams(stringParams).toString();
  }

  return (
    <UniversalFunctionContext.Provider
      value={{
        dateToPtBr,
        datetimeToPtBr,
        dateToIso,
        paramsForNavigation,
      }}
    >
      {children}
    </UniversalFunctionContext.Provider>
  );
};
