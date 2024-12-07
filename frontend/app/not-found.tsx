import Link from "next/link";
import MenuIcons from "@/components/icons/menuIcons";

export default function NotFound() {
  return (
    <div className="flex flex-col justify-center items-center h-screen">
      <div className="flex mb-4">
        <h1 className="text-4xl font-bold m-2">404</h1>
        <MenuIcons name="FaRegSadCry" className="text-4xl m-2" />
      </div>
      <h2 className="text-xl mb-8">A página não foi encontrada</h2>
      <Link href="/" className="text-blue-500 hover:underline">
        Voltar para a página inicial
      </Link>
    </div>
  );
}
