"use client";
import { Skeleton } from "@/components/ui/skeleton";

export const NoContent = () => {
  return (
    <div className="flex flex-col items-center justify-center m-4">
      <Skeleton className="h-6 w-[200px] bg-slate-200 dark:bg-slate-400 m-2 p-1" />
      <Skeleton className="h-6 w-[250px] bg-slate-200 dark:bg-slate-400 m-2 p-1" />
      <Skeleton className="h-6 w-[150px] bg-slate-200 dark:bg-slate-400 m-2 p-1" />
    </div>
  );
};
