import { Skeleton } from "@/components/ui/skeleton";

export const RoleBlank = () => {
  return (
    <div className="mb-2 p-1">
      <Skeleton className="h-4 w-[200px] bg-slate-200 dark:bg-slate-400 m-2 p-1" />
      <Skeleton className="h-4 w-[150px] bg-slate-200 dark:bg-slate-500 m-2 p-1" />
      <Skeleton className="h-4 w-[110px] bg-slate-200 dark:bg-slate-500 m-2 p-1" />
    </div>
  );
};
