"use client";
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select";
import { useCandidate } from "@/contexts/candidate";
import { useEffect } from "react";

export const FilterCandidate: React.FC = () => {
  const { recruitmentStages, getListCandidates, selectedFilterCandidate } = useCandidate();

  const selectChanged = (id: string) => {
    getListCandidates(+id);
  };

  return (
    <section className="m-3">
      <Select onValueChange={selectChanged} defaultValue={selectedFilterCandidate?.toString()}>
        <SelectTrigger>
          <SelectValue placeholder="Selecione o estágio" />
        </SelectTrigger>
        <SelectContent>
          {recruitmentStages &&
            recruitmentStages.map((recruitmentStage) => (
              <SelectItem
                key={"recruitment-stage-" + recruitmentStage.id.toString()}
                value={recruitmentStage.id.toString()}
              // {selectedFilterCandidate == recruitmentStage.id ? "selected" : ""}
              >
                {recruitmentStage.description}
              </SelectItem>
            ))}
        </SelectContent>
      </Select>
    </section>
  );
};
