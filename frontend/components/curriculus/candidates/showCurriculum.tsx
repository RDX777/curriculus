"use client";

import { Button } from "@/components/ui/button";
import { useCandidate } from "@/contexts/candidate";
import { useEffect, useState } from "react";
import { motion } from "framer-motion";

export const ShowCurriculum: React.FC = () => {
  const { setShowPreviousJobs, selectedCandidate, downloadResume } = useCandidate();

  const [isOpen, setIsOpen] = useState(false);

  useEffect(() => {
    if (!selectedCandidate) {
      setIsOpen(false);
    }
  }, [selectedCandidate, isOpen]);

  const toggleOpen = () => {
    setIsOpen(!isOpen);
  };

  return (
    <section className="w-full">
      <h1 className="text-2xl font-bold text-center mb-4 text-gray-900 dark:text-gray-100">
        {selectedCandidate?.candidate?.name
          ? `Currículo de ${selectedCandidate.candidate.name}`
          : "Selecione um candidato"}
      </h1>

      {!isOpen && (
        <motion.div
          initial={{ opacity: 0, height: 0 }}
          animate={{ opacity: 1, height: "auto" }}
          exit={{ opacity: 0, height: 0 }}
          transition={{ duration: 0.5, ease: "easeInOut" }}
        >
          <section className="flex justify-center mb-4 p-1 bg-white dark:bg-gray-700 shadow rounded">
            <Button
              variant="link"
              onClick={toggleOpen}
              disabled={selectedCandidate?.candidate?.name ? false : true}
            >
              Visualizar currículo &gt;&gt;&gt;
            </Button>
          </section>
        </motion.div>
      )}

      {isOpen && (
        <motion.div
          initial={{ opacity: 0, height: 0 }}
          animate={{ opacity: 1, height: "auto" }}
          exit={{ opacity: 0, height: 0 }}
          transition={{ duration: 0.5, ease: "easeInOut" }}
        >
          <section className="mb-4 p-4 bg-white dark:bg-gray-700 shadow rounded">
            <h2 className="text-xl font-semibold pb-2">Cadastrou-se na vaga</h2>
            <p>{selectedCandidate?.vacancy?.title}</p>
          </section>

          <section className="mb-4 p-4 bg-white dark:bg-gray-700 shadow rounded">
            <h2 className="text-xl font-semibold pb-2">Vagas Anteriores</h2>
            <Button variant="link" onClick={() => setShowPreviousJobs(true)}>
              Visualizar
            </Button>
          </section>

          <section className="mb-4 p-4 bg-white dark:bg-gray-700 shadow rounded">
            <h2 className="text-xl font-semibold pb-2">Recomendado por</h2>

            <p>
              <strong>Nome:</strong> {selectedCandidate?.indicated_by}
            </p>
          </section>

          <section className="mb-4 p-4 bg-white dark:bg-gray-700 shadow rounded">
            <h2 className="text-xl font-semibold pb-2">Dados Pessoais</h2>

            <p>
              <strong>Nome:</strong> {selectedCandidate?.candidate?.name}
            </p>
            <p>
              <strong>CPF:</strong> {selectedCandidate?.candidate?.cpf}
            </p>
            <p>
              <strong>Email:</strong> {selectedCandidate?.candidate?.email}
            </p>
            <p>
              <strong>Telefone:</strong> {selectedCandidate?.candidate?.phone}
            </p>
            <p>
              <strong>CEP:</strong> {selectedCandidate?.candidate?.cep}
            </p>
          </section>

          {/* Resumo Profissional */}
          <section className="mb-4 p-4 bg-white dark:bg-gray-700 shadow rounded">
            <h2 className="text-xl font-semibold pb-2">Resumo Profissional</h2>
            <p className="prose whitespace-pre-line">
              {selectedCandidate?.professional_summary}
            </p>
          </section>

          {/* Formação Acadêmica */}
          <section className="mb-4 p-4 bg-white dark:bg-gray-700 shadow rounded">
            <h2 className="text-xl font-semibold pb-2">Formação Acadêmica</h2>
            <p className="prose whitespace-pre-line">
              {selectedCandidate?.academic_background}
            </p>
          </section>

          {/* Experiência Profissional */}
          <section className="mb-4 p-4 bg-white dark:bg-gray-700 shadow rounded">
            <h2 className="text-xl font-semibold pb-2">
              Experiência Profissional
            </h2>
            <p className="prose whitespace-pre-line">
              {selectedCandidate?.professional_experience}
            </p>
          </section>

          {/* Informações Adicionais */}
          <section className="mb-4 p-4 bg-white dark:bg-gray-700 shadow rounded">
            <h2 className="text-xl font-semibold pb-2">
              Informações Adicionais
            </h2>
            <p className="prose whitespace-pre-line">
              {selectedCandidate?.additional_information}
            </p>
          </section>

          <section className="my-4 p-4 bg-white dark:bg-gray-700 shadow rounded">
            <h2 className="text-xl font-semibold pb-2">
              Currículo enviado pelo candidato
            </h2>
            {selectedCandidate?.file ? (
              <Button
                variant="link"
                className="hover:bg-blue-500 hover:text-white transition-colors duration-300"
                onClick={() => downloadResume(selectedCandidate?.file)}
              >
                Baixar
              </Button>
            ) : (
              "Não foi anexado currículo"
            )}
          </section>
        </motion.div>
      )}

      {isOpen && (
        <motion.div
          initial={{ opacity: 0, height: 0 }}
          animate={{ opacity: 1, height: "auto" }}
          exit={{ opacity: 0, height: 0 }}
          transition={{ duration: 0.5, ease: "easeInOut" }}
        >
          <section className="flex justify-center mb-4 p-1 bg-white dark:bg-gray-700 shadow rounded">
            <Button variant="link" onClick={toggleOpen}>
              &lt;&lt;&lt; Ocultar currículo
            </Button>
          </section>
        </motion.div>
      )}
    </section>
  );
};
