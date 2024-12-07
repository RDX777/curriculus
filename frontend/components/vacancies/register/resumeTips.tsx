"use client";
export const ResumeTips: React.FC = () => {
  return (
    <div className="container mx-auto bg-indigo-50 dark:bg-slate-900 border-l-4 border-indigo-900 text-black dark:text-slate-100 p-4 mb-6 rounded-md ">
      <h3 className="text-lg font-semibold">Dicas para um Bom Currículo</h3>
      <ul className="list-disc list-inside mt-2 space-y-2">
        <li>
          <strong>Seja Claro e Conciso:</strong> Mantenha seu currículo em 1-2
          páginas e use uma linguagem direta.
        </li>
        <li>
          <strong>Adapte seu Currículo:</strong> Personalize seu currículo para
          cada vaga, destacando as experiências mais relevantes.
        </li>
        <li>
          <strong>Use Palavras-Chave:</strong> Inclua palavras-chave
          relacionadas à posição desejada para passar pelos sistemas de triagem.
        </li>
        <li>
          <strong>Formatação Consistente:</strong> Utilize fontes e tamanhos de
          texto consistentes, com uma estrutura limpa e organizada.
        </li>
        <li>
          <strong>Revise e Peça Opiniões:</strong> Revise o currículo várias
          vezes e peça a amigos ou colegas para dar feedback.
        </li>
      </ul>
    </div>
  );
};
