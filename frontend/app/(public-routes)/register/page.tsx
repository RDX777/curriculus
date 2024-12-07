"use client";

import { useSearchParams } from "next/navigation";
import { Suspense, useEffect, useState } from "react";
import { RegisterForm } from "@/components/vacancies/register/registerForm";
import { ResumeTips } from "@/components/vacancies/register/resumeTips";

export default function RegisterPage() {
  const params = useSearchParams();
  const [uuid, setUuid] = useState<string | null>(null);

  useEffect(() => {
    setUuid(params.get("uuid"));
  }, [params]);

  return (
    <>
      <title>Trabalhe Conosco</title>
      <Suspense fallback={<div>Carregando...</div>}>
        <ResumeTips />
        <RegisterForm uuid={uuid} />
      </Suspense>
    </>
  );
}
