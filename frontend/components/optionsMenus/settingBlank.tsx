import { Skeleton } from "@/components/ui/skeleton";

export const SettingBlank = () => {
  return (
    <>
      <div className="flex flex-row space-x-2 m-1 p-1">
        <Skeleton className="h-4 w-[50px] bg-slate-200 dark:bg-slate-500" />
        <Skeleton className="h-4 w-[350px] bg-slate-200 dark:bg-slate-500" />
      </div>

      <div className="flex flex-row space-x-2 m-1 p-1">
        <Skeleton className="h-4 w-[50px] bg-slate-200 dark:bg-slate-500" />
        <Skeleton className="h-4 w-[250px] bg-slate-200 dark:bg-slate-500" />
      </div>

      <div className="flex flex-row space-x-2 m-1 p-1">
        <Skeleton className="h-4 w-[50px] bg-slate-200 dark:bg-slate-500" />
        <Skeleton className="h-4 w-[450px] bg-slate-200 dark:bg-slate-500" />
      </div>
    </>
  );
};
