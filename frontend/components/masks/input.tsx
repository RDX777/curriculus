import InputMask, { Props as InputMaskProps } from "react-input-mask";
import { Input } from "@/components/ui/input";

interface InputMaskedProps extends InputMaskProps {
  mask: string;
  value: string;
  onChange: (event: React.ChangeEvent<HTMLInputElement>) => void;
  id?: string;
  name?: string;
  placeholder?: string;
}
const InputMasked: React.FC<InputMaskedProps> = ({
  mask,
  value,
  onChange,
  ...rest
}) => {
  return (
    <InputMask mask={mask} value={value} onChange={onChange} {...rest}>
      {(inputProps) => <Input {...inputProps} />}
    </InputMask>
  );
};

export default InputMasked;
