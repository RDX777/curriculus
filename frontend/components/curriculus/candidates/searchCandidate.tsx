"use client";
import { ResumeType } from "@/types/curriculus/resumes/resumeType";
import { ScrollArea } from "@/components/ui/scroll-area";
import { useRouter } from 'next/navigation';

import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table";
import { useModalNotification } from "@/contexts/modalNotifications";

export type SearchCandidateType = {
    data: ResumeType[];
};

export const SearchCandidate: React.FC<SearchCandidateType> = ({ data }) => {
    const router = useRouter();

    const { setShowModal } = useModalNotification();

    const goSreening = (resume: ResumeType) => {
        setShowModal(false);
        router.push(`/recruitment/candidates/screening?uuid=${resume.uuid}`);
    }

    return (
        <ScrollArea className="h-max-96 p-4">

            <Table>
                <TableCaption>Lista de candidatos encontrados</TableCaption>
                <TableHeader>
                    <TableRow >
                        <TableHead className="w-[100px]">CPF</TableHead>
                        <TableHead>Nome</TableHead>
                        <TableHead>Estágio</TableHead>
                        <TableHead className="text-right">Vaga</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody className="flex-nowrap">
                    {data && data.map((resume) => (
                        <TableRow
                            key={`search-${resume.id.toString()}`}
                            className="cursor-pointer"
                            onClick={() => goSreening(resume)}
                        >
                            <TableCell className="font-medium">{resume.candidate?.cpf}</TableCell>
                            <TableCell>{resume.candidate?.name}</TableCell>
                            <TableCell>{resume.recruitment_stage?.description}</TableCell>
                            <TableCell className="text-right">{resume.vacancy?.title}</TableCell>
                        </TableRow>
                    ))}

                </TableBody>
            </Table>


        </ScrollArea>
    )
}