import { Label } from "@/components/ui/label";
import { Switch } from "@/components/ui/switch";
import { useSettings } from "@/contexts/settings";
import {
  Tooltip,
  TooltipContent,
  TooltipProvider,
  TooltipTrigger,
} from "@/components/ui/tooltip"

export const SettingSelector = ({
  type,
  setting,
}: {
  type: string;
  setting: any;
}) => {
  const { handleSelectedStatus } = useSettings();
  return (
    <TooltipProvider>
      <Tooltip>
        <TooltipTrigger asChild>
          <div className="flex items-center space-x-2 m-1 p-1">
            <Switch
              key={setting.name}
              className="text-red-900"
              checked={setting.selected}
              onClick={() => handleSelectedStatus(type, setting)}
              id={setting.name.toString()}
            />
            <Label htmlFor={setting.name}>{setting.description}</Label>
          </div>
        </TooltipTrigger>
        <TooltipContent>
          <p>{setting.name}</p>
        </TooltipContent>
      </Tooltip>
    </TooltipProvider>
  );
};
